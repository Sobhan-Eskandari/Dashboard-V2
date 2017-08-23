<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\storeSlider;
use App\Photo;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    /**
     * SliderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::all();
        return view('dashboard.sliders.create', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param storeSlider|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSlider $request)
    {
        $request['created_by'] = auth()->user()->getAuthIdentifier();
//        dd($request);
        auth()->guard('admin')->user();
        $slider = Slider::create($request->all());
        $slider->photos()->attach($request['indexPhoto']);
        return redirect()->action('SliderController@index')->with('success', "اسلایدر با موفقیت ذخیره شد.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $photos = Photo::all();
        return view('dashboard.sliders.edit', compact('slider', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->update($request->all());
        $slider->photos()->attach($request['indexPhoto']);
        return redirect()->action('SliderController@index')->with('success', "اسلایدر با موفقیت ویرایش شد.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sliders = Slider::findOrFail($request['sliders']);
        foreach ($sliders as $slider) {
            $slider->photos()->detach();
            $slider->delete();
        }
        return back()->with('success', "اسلایدر ها با موفقیت حذف شدند.");
    }
}
