<?php

namespace App\Http\Controllers;

use App\Http\Requests\tagRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
//use Zend\Diactoros\Response;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $referer = $request->header('referer');
        $tags = Tag::all();
        if($request->has('query')) {
            if(strpos($referer , 'create') || strpos($referer , 'edit')){
                $tags = Tag::search($request->input('query'))->orderBy('created_at', 'desc')->get();
            }else {
                $tags = Tag::search($request->input('query'))->get();
            }
        }
        if ($request->ajax()){
            if(strpos($referer , 'create') || strpos($referer , 'edit')){
                return view('includes.posts.PostTags', compact('tags'))->render();
            }else {
                return view('includes.tags.AllTags', compact('tags'));
            }
        }
        return view('dashboard.tag.index',compact('tags'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $referer = $request->header('referer');
        $input = $request->all();
        $input['created_by']=1;
        $tag = Tag::create($input);
        $msg = "تگ ساخته شد.";
        $token =csrf_token();
        if(strpos($referer , 'create') || strpos($referer , 'edit')){
            $tags = Tag::orderBy('created_at', 'desc')->get();
            return view('Includes.posts.PostTags', compact('tags'))->render();
        }
        $data=['tag'=>$tag,'message'=>$msg,'token'=>$token];
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function destroy(Request $request, $id)
    {
        $referer = $request->header('referer');
        $tag=Tag::find($id);
        $tag->forceDelete();
        if(strpos($referer , 'create') || strpos($referer , 'edit')){
            $tags = Tag::orderBy('created_at', 'desc')->get();
            return view('Includes.PostTags', compact('tags'))->render();
        }
        $msg="تگ پاک شد!";
        return $msg;

    }
}
