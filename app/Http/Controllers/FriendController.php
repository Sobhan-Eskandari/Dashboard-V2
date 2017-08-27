<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Http\Requests\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FriendController extends Controller
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
            $friends = Friend::search($request->input('query'))->orderBy('updated_at','desc')->paginate(8);
        }else{
            $friends = Friend::orderByRaw('updated_at desc')->paginate(8);
        }

        if ($request->ajax()) {
            return view('includes.friends.AllFriends', compact('friends'))->render();
        }

        return view('dashboard.friends.index', compact('friends'));
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
     * @param FriendRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FriendRequest $request)
    {
        try {
            auth()->user()->friends()->save(Friend::create($request->all()));
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        $friends = Friend::orderByRaw('updated_at desc')->paginate(8);

        if($request->ajax()){
            return view('includes.friends.AllFriends', compact('friends'))->render();
        }else{
            return redirect(route('friends.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Friend $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Friend $friend)
    {
        if($request->ajax()){
            return json_encode($friend);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FriendRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(FriendRequest $request, $id)
    {
        $friend = Friend::findOrFail($id);

        $friend->revisions++;
        $friend->updated_by = Auth::user()->id;
        $friend->update($request->all());

        $friends = Friend::pagination();

        if($request->ajax()){
            return view('includes.friends.AllFriends', compact('friends'))->render();
        }else{
            return redirect(route('friends.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Friend $friend)
    {
        $friend->delete();
        Session::flash('danger', 'دوست با موفقیت پاک شد');
        return redirect(route('friends.index'));
//        try {
//            $friend->update(['updated_by' => Auth::user()->id]);
//            $friend->delete();
//        }catch (\Exception $exception){
//            dd($exception->getMessage());
//        }
//
//        $friends = Friend::pagination();
//        if($request->ajax()){
//            return view('includes.friends.AllFriends', compact('friends'))->render();
//        }else{
//            return redirect(route('friends.index'));
//        }
    }

    public function multiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        Friend::destroy($ids);
        Session::flash('danger', 'دوست ها با موفقیت پاک شدند');
        return redirect(route('friends.index'));
//        $input = $request->all();
//        $ids = explode(',', $input['ids']);
//        try {
//            foreach ($ids as $id){
//                $deleteFriend = Friend::findOrFail($id);
//                $deleteFriend->update(['updated_by' => Auth::user()->id]);
//                $deleteFriend->delete();
//            }
//        }catch (\Exception $exception){
//            dd($exception->getMessage());
//        }
//
//        $friends = Friend::pagination();
//
//        if($request->ajax()){
//            return view('Includes.AllFriends', compact('friends'))->render();
//        }else{
//            return redirect(route('friends.inbox'));
//        }
    }
}
