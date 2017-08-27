<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PhotoController extends Controller
{
    //    public function store(Request $request)
//    {
//        $file = $request->file('file');
//
//        $name = time() . $file->getClientOriginalName();
//
//        $file->move('gallery', $name);
//
//        Photo::create([
//            'name' => $name,
//            'created_by' => Auth::user()->id
//        ]);
//    }

    public function index(){
        $photos = Photo::all();
        return view('dashboard.gallery.index',compact('photos'));
    }

    public function store(Request $request){
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('photoGallery'),$imageName);
        Photo::create([
            'name'=>$imageName,
            'created_by'=>1
        ]);
        $photos = Photo::all();
        return view('includes.galleries.AllPhotosGallery',compact('photos'));
    }

    public function multiDestroy(Request $request)
    {
        foreach ($request->checkboxes as $id){
            $photo = Photo::findOrFail($id);
            File::delete('photos/'.$photo->name);
            $photo->delete();
        }

        $photos = Photo::all();
        return view('includes.galleries.AllPhotosGallery', compact('photos'));
    }
}
