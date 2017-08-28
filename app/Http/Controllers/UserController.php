<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request){
//        $user = User::find(1);
//        dd($user->photo);
//        $currentPage = 3; // You can set this to any page you want to paginate to
//
//        // Make sure that you call the static method currentPageResolver()
//        // before querying users
//        Paginator::currentPageResolver(function () use ($currentPage) {
//            return $currentPage;
//        });

        $users = User::latest()->paginate(8);
        if ($request->has('query')) {
            $users = User::search($request->input('query'))->paginate(8);
//            dd($users);
        }
        if ($request->ajax()) {
            return view('includes.users.AllUsers', compact('users'));
        }
        return view('dashboard.users.index',compact('users'));
    }
    public function destroy(Request $request,User $user){
        $user->delete();
        return redirect()->back();
//        if ($request->has('query')) {
//            $users = User::search($request->input('query'))->paginate(8);
////        }
//        return view('Includes.AllUsers', compact('users'))->render();
    }
    public function multiDestroy(Request $request){
        foreach ($request->input('checkboxes') as $checkbox) {
            if ($checkbox === "on") {
                continue;
            }
            $user = User::find($checkbox);
            $user->delete();
        }
//            sleep(5);
        if ($request->has('query')) {
            $users = User::search($request->input('query'))->paginate(8);
        } else {
            $users = User::pagination();
        }
        return view('Includes.AllUsers', compact('users'))->render();
    }
    public function create(){
        $photos = Photo::all();
        return view('dashboard.users.create',compact('users','photos'));
    }
    public function store(Request $request){
//        dd($request->all());
        $input= $request->all();
        $input['verified'] = 1;
        $input['created_by'] = 1;
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect()->route('all.users');
    }
    public function photo(Request $request){
//        if ($request->has('avatarId')) {
//            $photo = Photo::findOrFail($request->input('avatarId'));
//            File::delete('UserImage/' . $photo->address);
//            $photo->forceDelete();
//        }
//        if ($file = $request->file('avatar')) {
//            $name = time() . $file->getClientOriginalName();
//            $file->move('UserImage', $name);
//            $photo = Photo::create(['address' => $name, 'created_by' => 1, 'position' => '1']);
        $photo = Photo::find($request->checkboxes[0]);
        return view('Includes.UserImage', compact('photo'));
//        }
    }
    public function show(User $user){
        return view('dashboard.users.show', compact('user'));
    }
    public function edit(User $user){
        $photo = $user->photo;
        $photos = Photo::all();
        return view('dashboard.users.edit', compact('user','photo','photos'));
    }
    public function update(Request $request,User $user){
        $input = $request->all();
        if($request->has('password')){
            $input['password'] = bcrypt($request->password);
        }else{
            $input['password'] = $user->password;
        }
        $user->update($input);
        return redirect()->route('all.users');
    }
    public function trash(Request $request){
        $users = User::onlyTrashed()->paginate(8);
//        dd($comments);
//        if($request->has('query')) {
//            $comment= Comment::onlyTrashed()->search($request->input('query'));
////            $comments = $comment->where('deleted_at','==',NULL)->get();
//            dd($comment);
////            $comments = Comment::search($request->input('query'))->paginate(8);
//        }
        if ($request->ajax()){
            return view('Includes.AllTrashedUsers',compact('users'));
        }
        return view('dashboard.users.trash', compact('users'));
    }
    public function forceDelete($user){
        $users = User::onlyTrashed()->find($user);
        $users->forceDelete();
        $users = User::onlyTrashed()->paginate();
        return view('Includes.AllTrashedUsers',compact('users'))->render();
    }

    public function forceMultiDelete(Request $request){
        foreach ($request->input('checkboxes') as $checkbox) {
            if ($checkbox === "on") {
                continue;
            }
            User::onlyTrashed()->find($checkbox)->forceDelete();;
        }
        $users = User::onlyTrashed()->paginate();
        return view('Includes.AllTrashedUsers',compact('users'))->render();
    }

    public function restore($user){
        $users = User::onlyTrashed()->find($user);
        $users->restore();
        $users = User::onlyTrashed()->paginate();
        return view('Includes.AllTrashedUsers',compact('users'))->render();
    }
}
