<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PhotoController extends Controller
{
    public function index(){
        $photos = Photo::all();
        return view('dashboard.gallery.index',compact('photos'));
    }

    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . $image->getClientOriginalName();
        $image->move(public_path('gallery'), $imageName);

        auth()->user()->createPhotos()->save(Photo::create(['name' => $imageName]));

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

    public function galleryModalAjaxLoader(Request $request)
    {
        if($request->ajax()){
            $photos = Photo::orderBy('created_at', 'desc')->get();
            return view('includes.galleries.AllPhotos', compact('photos'));
        }
    }
}
