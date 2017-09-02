<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditSliderRequest;
use App\Http\Requests\SliderRequest;
use App\Photo;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
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
     * @param SliderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        auth()->user()->sliders()->save($slider = Slider::create($request->all()));

        $slider->photos()->attach($request['indexPhoto']);

        Session::flash('success', 'اسلاید با موفقیت ساخته شد');

        return redirect(route('sliders.index'));
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
     * @param SliderRequest $request
     * @param  \App\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $slider->update($request->all());

        $slider->photos()->detach();
        $slider->photos()->attach($request['indexPhoto']);

        Session::flash('warning', 'اسلاید با موفقیت ویرایش شد');

        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->photos()->detach();
        $slider->delete();

        Session::flash('danger', 'اسلاید مورد نظر حذف شد');

        return redirect(route('sliders.index'));
    }
}
