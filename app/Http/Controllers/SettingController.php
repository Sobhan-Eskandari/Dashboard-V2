<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Setting;
use App\Photo;
use App\Http\Requests\SettingStoreRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(($setting = Setting::first()) !== null) {
            return $this->edit($setting);
        }else{
            return $this->create();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::all();
        return view('dashboard.settings.create', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SettingRequest $request
     * @return \Illuminate\Http\Response
     * @internal param $
     */
    public function store(Request $request)
    {
        $logo = $request->file('logoFile');

        $request['logo'] = time() . $logo->getClientOriginalName();

        $logo->move(public_path('images'), $request['logo']);

        auth()->user()->setting()->save($setting = Setting::create($request->all()));

        $setting->photos()->attach([
            $request['header_img'],
            $request['about_us_img']
        ]);

        Photo::findOrFail($request['header_img'])->update(['position' => 'header']);
        Photo::findOrFail($request['about_us_img'])->update(['position' => 'about_us']);

        Session::flash('success', 'تنظیمات با موفقیت ثبت شد');

        return redirect(route('settings.index'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $photos = Photo::orderBy('created_at', 'desc')->get();
        return view('dashboard.settings.edit', compact('setting', 'photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @return \Illuminate\Http\Response
     * @internal param Setting $setting
     */
    public function update(SettingRequest $request)
    {
        $setting = Setting::first();

        $setting->revisions++;
        $setting->updated_by = Auth::user()->id;
        $setting->update($request->all());

        Session::flash('success', 'تنظیمات با موفقیت ویررایش شد');
        return redirect(route('settings.index'));
    }
}
