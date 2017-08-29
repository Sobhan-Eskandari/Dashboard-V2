<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Photo;
use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
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

        $users = User::pagination(8);
        if ($request->has('query')) {
            $users = User::search($request->input('query'))->paginate(8);
//            dd($users);
        }
        if ($request->ajax()) {
            return view('Includes.AllUsers', compact('users'));
        }
        return view('dashboard.users.index',compact('users'));
    }
    public function destroy(Request $request,User $user){
//        dd($request->all());
        $user->delete();
        if ($request->has('query')) {
            $users = User::search($request->input('query'))->paginate(8);
        } else {
            $users = User::pagination();
        }
        return view('Includes.AllUsers', compact('users'))->render();
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

    /*
     * Admin routes
     */
    public function adminIndex(Request $request)
    {
        if($request->has('query')){
            $admins = User::search($request->input('query'))->whereIsAdmin(1)->orderBy('updated_at', 'desc')->get();
            $admins->load(['parent', 'photos']);
        }else{
            $admins = User::with(['parent', 'photos'])->whereIsAdmin(1)->orderBy('updated_at', 'desc')->get();
        }

        if ($request->ajax()) {
            return view('includes.admins.AllAdmins', compact('admins'))->render();
        }

        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
    {
        $photos = Photo::orderBy('created_at', 'desc')->get();
        return view('dashboard.admins.create', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function adminStore(AdminRequest $request)
    {
        $request['email_token'] = str_random(30) . Uuid::uuid();
        $request['password'] = bcrypt($request->password);
        $request['is_admin'] = 1;

        auth()->user()->children()->save($admin = User::create($request->all()));

        $admin->photos()->attach($request['indexPhoto']);

        Session::flash('success', 'ادمین با موفقیت ساخته شد');
        return redirect(route('admins.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminEdit($id)
    {
        $admin = User::with('photos')->findOrFail($id);
        $photos = Photo::orderBy('created_at', 'desc')->get();
        return view('dashboard.admins.edit', compact('admin','photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AdminUpdate(AdminRequest $request, $id)
    {
        $admin = User::findOrFail($id);

        $admin->revisions++;
        $admin->updated_by = Auth::user()->id;

        $input = $request->all();

        if(is_null($input['password'])){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        $admin->photos()->detach();
        $admin->photos()->attach($input['indexPhoto']);

        $admin->update($input);
        Session::flash('warning', 'ادمین با موفقیت ویرایش شد');
        return redirect(route('admins.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response -
     */
    public function adminDestroy(Request $request, $id)
    {
        $relations = ['faqs', 'categories', 'outboxes', 'tags'];

        $admin = User::with($relations)->findOrFail($id);

        $admin->updated_by = Auth::user()->id;

        foreach ($relations as $relation) {
            foreach ($admin->{$relation} as $item){
                $item->delete();
            }
        }
        $admin->delete();

        Session::flash('danger', 'ادمین مورد نظر با موفقیت پاک شد');
        return redirect(route('admins.index'));
//        if($request->ajax()){
//            try {
//                foreach ($relations as $relation) {
//                    foreach ($admin->{$relation} as $item){
//                        $item->delete();
//                    }
//                }
//                $admin->delete();
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $admins = User::with(['parent', 'photos'])->orderBy('updated_at', 'desc')->get();
//            return view('includes.admins.AllAdmins', compact('admins'))->render();
//        }
    }

    public function adminTrash(Request $request)
    {
        $admins = User::with(['parent', 'photos'])->onlyTrashed()->orderBy('updated_at', 'desc')->paginate(8);

        if ($request->ajax()) {
            return view('includes.admins.AllAdminsTrash', compact('admins'))->render();
        }

        return view('dashboard.admins.trash', compact('admins'));
    }

    public function adminForceDestroy(Request $request, $id)
    {
        $relations = ['faqs', 'categories', 'outboxes', 'tags'];
        $admin = User::with($relations)->onlyTrashed()->findOrFail($id);

        foreach ($relations as $relation) {
            foreach ($admin->{$relation} as $item){
                $item->forceDelete();
            }
        }

        $admin->photos()->detach();
        $admin->forceDelete();

        Session::flash('danger', 'ادمین مورد نظر به صورت دائمی حذف شد');
        return redirect(route('admins.trash'));
//        if($request->ajax()){
//            try {
//                foreach ($relations as $relation) {
//                    foreach ($admin->{$relation} as $item){
//                        $item->forceDelete();
//                    }
//                }
//                $admin->photos()->detach();
//                $admin->forceDelete();
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $admins = Admin::pagination();
//            $roles = Role::all();
//            return view('Includes.AllAdminsTrash', compact('admins', 'roles'))->render();
//        }
    }

    public function adminForceMultiDestroy(Request $request)
    {
        $relations = ['faqs', 'categories', 'outboxes', 'tags'];

        $ids = explode(',', $request['ids']);

        foreach ($ids as $id){
            $admin = User::with($relations)->onlyTrashed()->findOrFail($id);
            foreach ($relations as $relation) {
                foreach ($admin->{$relation} as $item){
                    $item->forceDelete();
                }
            }
            $admin->photos()->detach();
            $admin->forceDelete();
        }

        Session::flash('danger', 'ادمین های مورد نظر به صورت دائمی حذف شدند');
        return redirect(route('admins.trash'));
//        if($request->ajax()){
//            $input = $request->all();
//            $ids = explode(',', $input['ids']);
//            try {
//                foreach ($ids as $id){
//                    $admin = Admin::with($relations)->onlyTrashed()->findOrFail($id);
//                    foreach ($relations as $relation) {
//                        foreach ($admin->{$relation} as $item){
//                            $item->forceDelete();
//                        }
//                    }
//                    $admin->photos()->detach();
//                    $admin->forceDelete();
//                }
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $admins = Admin::pagination();
//            $roles = Role::all();
//            return view('Includes.AllAdminsTrash', compact('admins', 'roles'))->render();
//        }
    }

    public function adminRestore(Request $request, $id)
    {
        $user = Auth::user()->id;
        $relations = ['faqs', 'categories', 'outboxes', 'tags'];
        $admin = User::onlyTrashed()->findOrFail($id);

        foreach ($relations as $relation) {
            foreach ($admin->{$relation} as $item){
                $item->updated_by = $user;
                $item->save();
                $item->restore();
            }
        }
        $admin->updated_by = $user;
        $admin->save();
        $admin->restore();

        Session::flash('warning', 'ادمین مورد نظر با موفقیت بازگردانی شد');
        return redirect(route('admins.trash'));
//        if($request->ajax()){
//            try {
//                foreach ($relations as $relation) {
//                    foreach ($admin->{$relation} as $item){
//                        $item->updated_by = Auth::user()->id;
//                        $item->save();
//                        $item->restore();
//                    }
//                }
//                $admin->updated_by = $user;
//                $admin->save();
//                $admin->restore();
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $admins = Admin::pagination();
//            $roles = Role::all();
//            return view('Includes.AllAdminsTrash', compact('admins', 'roles'))->render();
//        }
    }
}
