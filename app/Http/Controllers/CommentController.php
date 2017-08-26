<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::latest()->paginate(8);

        if ($request->has('query') && $request->query != null) {
            $comments = Comment::search($request->input('query'))->paginate(8);
        }

        if ($request->ajax()) {
            return view('includes.comments.AllComments', compact('comments'));
        }

        return view('dashboard.comments.index', compact('comments'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('dashboard.comments.show', compact('comment'));
    }

    public function answer(Request $request)
    {
        $input = $request->all();
        $input['full_name'] = 'admin';
        $input['tracking_code'] = 'jasndkajsdnasjdasdasdjkasd';
        auth()->user()->comments()->save(Comment::create($input));
        return redirect(route('comments.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $comments = Comment::with('parent')->find($comment->id);
        return view('dashboard.comments.edit', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $comment = Comment::with('children')->find($comment->id);
        $comment->children()->delete();
        $comment->delete();
        if ($request->has('query')) {
            $comments = Comment::search($request->input('query'))->paginate(8);
        } else {
            $comments = Comment::paginate();
        }

        if($request->ajax()){
            return view('includes.comments.AllComments', compact('comments'))->render();
        }else{
            return redirect(route('comments.index'));
        }
    }

    public function multiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        foreach ($ids as $checkbox) {
            if ($checkbox === "on") {
                continue;
            }

            $comment = Comment::with('children')->find($checkbox);
            $comment->children()->delete();
            $comment->delete();
        }

        if ($request->has('query')) {
            $comments = Comment::search($request->input('query'))->paginate(8);
        } else {
            $comments = Comment::paginate();
        }

        if ($request->ajax()){
            return view('includes.comments.AllComments', compact('comments'))->render();
        }else{
            return redirect(route('comments.index'));
        }
    }

    public function approve(Comment $comment)
    {
        $comment->status = 'checked';
        $comment->save();
        return redirect()->route('comments.index');
    }

    public function trash(Request $request)
    {
        $comments = Comment::onlyTrashed()->paginate(8);

        if ($request->ajax()){
            return view('includes.comments.AllTrashedComments',compact('comments'));
        }

        return view('dashboard.comments.trash', compact('comments'));
    }

    public function restore(Request $request, $id)
    {
        $comment = Comment::with('children')->onlyTrashed()->find($id);
        $comment->children()->restore();
        $comment->restore();
        if ($request->has('query')) {
            $comments = Comment::search($request->input('query'))->paginate(8);
        } else {
            $comments = Comment::onlyTrashed()->paginate();
        }

        if ($request->ajax()){
            return view('includes.comments.AllComments', compact('comments'))->render();
        }else{
            return redirect(route('comments.trash'));
        }
    }

    public function forceDelete(Request $request, $id)
    {
        $comment = Comment::with('children')->onlyTrashed()->find($id);
        $comment->children()->forceDelete();
        $comment->forceDelete();
        if ($request->has('query')) {
            $comments = Comment::search($request->input('query'))->paginate(8);
        } else {
            $comments = Comment::onlyTrashed()->paginate();
        }

        if ($request->ajax()){
            return view('includes.comments.AllComments', compact('comments'))->render();
        }else{
            return redirect(route('comments.trash'));
        }
    }

    public function multiForceDelete(Request $request)
    {
        $ids = explode(',', $request['ids']);
        foreach ($ids as $checkbox) {
            if ($checkbox === "on") {
                continue;
            }
            $comment = Comment::with('children')->onlyTrashed()->find($checkbox);
            $comment->children()->forceDelete();
            $comment->forceDelete();
        }

        if ($request->input('query')!==null) {
            $comments = Comment::search($request->input('query'))->paginate(8);
        } else {
            $comments = Comment::onlyTrashed()->paginate();
        }

        if ($request->ajax()){
            return view('includes.comments.AllTrashedComments', compact('comments'))->render();
        }else{
            return redirect(route('comments.trash'));
        }
    }
}
