<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostRequest;
use App\Photo;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Morilog\Jalali\Facades\jDate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
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
            return view('includes.posts.AllPosts', compact('posts'))->render();
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
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request['updated_by'] = Auth::user()->id;
        auth()->user()->posts()->save($post = Post::create($request->all()));

        $tags = explode(',', $request['selectedTags']);
        $post->tags()->attach($tags);

        $categories = explode(',', $request['selectedCategories']);
        $post->categories()->attach($categories);

        $post->photos()->attach($request['indexPhoto']);

        if($request['draft'] === '1'){
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
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $id
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
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->revisions++;
        $user = Auth::user()->id;

        $request['updated_by'] = $user;
        $post->update($request->all());

        $tags = explode(',', $request['selectedTags']);

        $post->tags()->sync($tags);

        $categories = explode(',', $request['selectedCategories']);
        $post->categories()->sync($categories);

        $post->photos()->detach();
        $post->photos()->attach($request['indexPhoto']);

        if($request['draft'] === '0'){
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
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request, Post $post)
    {
        try {
            $post->update(['updated_by' => Auth::user()->id]);
            $post->delete();
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        Session::flash('danger', 'پست مورد نظر با موفقیت پاک شد');

        if($request->header('referer') == URL::to('/posts/drafts')) {
            return redirect(route('posts.draft'));
        }

        return redirect(route('posts.index'));
    }

    public function multiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        try {
            foreach ($ids as $id){
                $post = Post::findOrFail($id);
                $post->update(['updated_by' => Auth::user()->id]);
                $post->delete();
            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        Session::flash('danger', 'پست های مورد نظر با موفقیت پاک شدند');

        if($request->header('referer') == URL::to('/posts/drafts')) {
            return redirect(route('posts.draft'));
        }

        return redirect(route('posts.index'));
    }

    public function trash(Request $request)
    {
        $posts = Post::with(['updater', 'creator', 'categories', 'tags', 'comments'])->onlyTrashed()->orderBy('updated_at', 'desc')->paginate(8);

        if ($request->ajax()) {
            return view('includes.posts.AllPostsTrash', compact('posts'))->render();
        }

        return view('dashboard.posts.trash', compact('posts'));
    }

    public function forceDestroy(Request $request, $id)
    {
//        if($request->ajax()){
//            try {
//                Post::onlyTrashed()->findOrFail($id)->forceDelete();
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $posts = Post::pagination(URL::to('/posts/trash'));
//            return view('includes.posts.AllPostsTrash', compact('posts'))->render();
//        }
        Session::flash('danger', 'پست مورد نظر به صورت دائمی حذف شد');
        Post::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('posts.trash');
    }

    public function forceMultiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        foreach ($ids as $id){
            Post::onlyTrashed()->findOrFail($id)->forceDelete();
        }

        Session::flash('danger', 'پست های مورد نظر به صورت دائمی حذف شدند');
        return redirect()->route('posts.trash');
//        if($request->ajax()){
//            $ids = explode(',', $request['ids']);
//            try {
//                foreach ($ids as $id){
//                    Post::onlyTrashed()->findOrFail($id)->forceDelete();
//                }
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $posts = Post::pagination(URL::to('/posts/trash'));
//            return view('includes.posts.AllPostsTrash', compact('posts'))->render();
//        }
    }

    public function restore(Request $request, $id)
    {
//        if($request->ajax()){
//            try {
//                Post::onlyTrashed()->findOrFail($id)->restore();
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $posts = Post::pagination(URL::to('/posts/trash'));
//            return view('includes.posts.AllPostsTrash', compact('posts'))->render();
//        }

        Session::flash('success', 'پست مورد نظر بازگردانی شد');
        Post::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('posts.trash');
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
            $posts->load(['updater', 'creator', 'categories', 'tags', 'comments']);
        }else{
            $posts = Post::with(['updater', 'creator', 'categories', 'tags', 'comments'])->where('draft', 1)->orderBy('updated_at', 'desc')->paginate(8);
        }

        if($request->ajax()){
            return view('includes.posts.AllPostsDraft', compact('posts'))->render();
        }

        return view('dashboard.posts.draft', compact('posts'));
    }
}
