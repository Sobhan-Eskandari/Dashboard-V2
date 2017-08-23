<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $referer = $request->header('referer');
        if($request->has('query')){
            if(strpos($referer , 'create') || strpos($referer , 'edit')){
                $categories = Category::search($request->input('query'))->orderBy('created_at','desc')->get();
            }else{
                $categories = Category::search($request->input('query'))->orderBy('updated_at','desc')->paginate(8);
            }
        }else{
            $categories = Category::orderBy('updated_at','desc')->paginate(8);
        }

        if ($request->ajax()) {
            if(strpos($referer , 'create') || strpos($referer , 'edit')){
                return view('Includes.PostCategories', compact('categories'))->render();
            }else{
                return view('includes.categories.AllCategories', compact('categories'))->render();
            }
        }

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $referer = $request->header('referer');
        if($request->ajax()){
            try {
                auth()->user()->categories()->save(Category::create($request->all()));
            }catch (\Exception $exception){
                dd($exception->getMessage());
            }

            if(strpos($referer , 'create') || strpos($referer , 'edit')){
                $categories = Category::orderBy('created_at', 'desc')->get();
                return view('Includes.PostCategories', compact('categories'))->render();
            }else{
                $categories = Category::orderBy('updated_at','desc')->paginate(8);
                return view('includes.categories.AllCategories', compact('categories'))->render();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        if($request->ajax()){
            return json_encode($category);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if($request->ajax()){

            $input = $request->all();
            $category->revisions++;
            $category->updated_by = Auth::user()->id;
            $category->update($input);

            auth()->user()->categories()->save(Category::create($request->all()));

            $categories = Category::pagination();

            return view('includes.categories.AllCategories', compact('categories'))->render();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
