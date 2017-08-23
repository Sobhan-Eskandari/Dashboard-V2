<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Facades\jDate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('query')){
            $posts = Post::search($request->input('query'))->where('draft', 0)->orderBy('updated_at', 'desc')->paginate(8);
            $posts->load(['updater', 'creator', 'categories', 'tags', 'comments']);
        }else{
            $posts = Post::with(['updater', 'creator', 'categories', 'tags', 'comments'])->where('draft', 0)->orderBy('updated_at', 'desc')->paginate(8);
        }

        if($request->ajax()){
            return view('Includes.AllPosts', compact('posts'))->render();
        }

        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $photos = Photo::orderBy('created_at', 'desc')->get();
        return view('dashboard.posts.create', compact('categories', 'tags', 'photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();
        Auth::loginUsingId(1);
        $user = Auth::user()->id;
        $input['created_by'] = $user;
        $input['updated_by'] = $user;
        $post = Post::create($input);

        $tags = explode(',', $input['selectedTags']);
        $post->tags()->attach($tags);

        $categories = explode(',', $input['selectedCategories']);
        $post->categories()->attach($categories);

        $post->photos()->attach($input['indexPhoto']);

        if($input['draft'] === '1'){
            Session::flash('success', 'پست با موفقیت ساخته و پیش نویس شد');
            return redirect(route('posts.draft'));
        }else {
            Session::flash('success', 'پست جدید با موفقیت ساخته شد');
            return redirect(route('posts.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->get();
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedTags = [];
        $selectedCategories = [];
        $indexPhoto = null;

        $photos = Photo::orderBy('created_at', 'desc')->get();

        $categories = Category::orderBy('created_at', 'desc')->get();
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $post = Post::with(['tags', 'categories', 'creator', 'updater'])->findOrFail($id);

        foreach ($post->tags as $tag){
            $selectedTags[] = $tag->id;
        }

        $selectedTags = implode($selectedTags, ',');

        foreach ($post->categories as $category){
            $selectedCategories[] = $category->id;
        }

        if(count($post->photos) != 0){
            $indexPhoto = $post->photos;
        }

        $selectedCategories = implode($selectedCategories, ',');

        return view('dashboard.posts.edit', compact('post', 'photos', 'categories', 'tags', 'selectedCategories', 'selectedTags', 'indexPhoto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->revisions++;

        $input = $request->all();
        $user = Auth::user()->id;

        $input['updated_by'] = $user;
        $post->update($input);

        $tags = explode(',', $input['selectedTags']);
        $post->tags()->sync($tags);

        $categories = explode(',', $input['selectedCategories']);
        $post->categories()->sync($categories);

        $post->photos()->detach();
        $post->photos()->attach($input['indexPhoto']);

        if($input['draft'] === '0'){
            Session::flash('warning', 'پست با موفقیت ویرایش و منتشر شد');
            return redirect(route('posts.index'));
        }else{
            Session::flash('warning', 'پست با موفقیت ویرایش و پیش نویس شد');
            return redirect(route('posts.draft'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        if($request->ajax()){
            try {
                $post->update(['updated_by' => Auth::user()->id]);
                $post->delete();
            }catch (\Exception $exception){
                dd($exception->getMessage());
            }

            if(strpos($request->header('referer'), 'posts-drafts')) {
                $posts = Post::pagination('http://dashboard.dev/posts-drafts', '1');
                return view('Includes.AllPostsDraft', compact('posts'))->render();
            }else{
                $posts = Post::pagination();
                return view('Includes.AllPosts', compact('posts'))->render();
            }
        }
    }

    public function multiDestroy(Request $request)
    {
        if($request->ajax()){
            $input = $request->all();
            $ids = explode(',', $input['ids']);
            try {
                foreach ($ids as $id){
                    $post = Post::findOrFail($id);
                    $post->update(['updated_by' => Auth::user()->id]);
                    $post->delete();
                }
            }catch (\Exception $exception){
                dd($exception->getMessage());
            }

            if(strpos($request->header('referer'), 'posts-drafts')) {
                $posts = Post::pagination('http://dashboard.dev/posts-drafts', '1');
                return view('Includes.AllPostsDraft', compact('posts'))->render();
            }else{
                $posts = Post::pagination();
                return view('Includes.AllPosts', compact('posts'))->render();
            }
        }
    }

    public function trash(Request $request)
    {
        $posts = Post::with(['updater', 'creator', 'categories', 'tags'])->onlyTrashed()->orderBy('updated_at', 'desc')->paginate(8);

        if ($request->ajax()) {
            return view('Includes.AllPostsTrash', compact('posts'))->render();
        }

        return view('dashboard.posts.trash', compact('posts'));
    }

    public function forceDestroy(Request $request, $id)
    {
        if($request->ajax()){
            try {
                Post::onlyTrashed()->findOrFail($id)->forceDelete();
            }catch (\Exception $exception){
                dd($exception->getMessage());
            }

            $posts = Post::pagination("http://dashboard.dev/posts-trash");
            return view('Includes.AllPostsTrash', compact('posts'))->render();
        }
    }

    public function forceMultiDestroy(Request $request)
    {
        if($request->ajax()){
            $input = $request->all();
            $ids = explode(',', $input['ids']);
            try {
                foreach ($ids as $id){
                    Post::onlyTrashed()->findOrFail($id)->forceDelete();
                }
            }catch (\Exception $exception){
                dd($exception->getMessage());
            }

            $posts = Post::pagination("http://dashboard.dev/posts-trash");
            return view('Includes.AllPostsTrash', compact('posts'))->render();
        }
    }

    public function restore(Request $request, $id)
    {
        if($request->ajax()){
            try {
                Post::onlyTrashed()->findOrFail($id)->restore();
            }catch (\Exception $exception){
                dd($exception->getMessage());
            }

            $posts = Post::pagination("http://dashboard.dev/posts-trash");
            return view('Includes.AllPostsTrash', compact('posts'))->render();
        }
    }

    public function imageUpload(Request $request)
    {
        $this->validate($request, [
            'upload' => 'required|mimes:jpeg,png,bmp,jpg'
        ]);

        $name = '';

        if($file = $request->file('upload')){
            $name = time() . $file->getClientOriginalName();
            $file->move('PostsPhotos', $name);
        }

        $url = '/PostsPhotos/' . $name;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1, '{$url}', '')</script>";
    }

    public function draft(Request $request)
    {
        if($request->has('query')){
            $posts = Post::search($request->input('query'))->where('draft', 1)->orderBy('updated_at', 'desc')->paginate(8);
            $posts->load(['updater', 'creator', 'categories', 'tags']);
        }else{
            $posts = Post::with(['updater', 'creator', 'categories', 'tags'])->where('draft', 1)->orderBy('updated_at', 'desc')->paginate(8);
        }

        if($request->ajax()){
            return view('Includes.AllPostsDraft', compact('posts'))->render();
        }

        return view('dashboard.posts.draft', compact('posts'));
    }
}
