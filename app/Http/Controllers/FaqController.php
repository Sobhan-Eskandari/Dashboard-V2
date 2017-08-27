<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Facades\jDate;

class FaqController extends Controller
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
            $faqs = FAQ::search($request->input('query'))->orderBy('updated_at','desc')->get();
            $faqs->load('user');
        }else{
            $faqs = FAQ::pagination();
        }

        if ($request->ajax()) {
            return view('includes.faqs.AllFaqs', compact('faqs'))->render();
        }

        return view('dashboard.faqs.index', compact('faqs'));
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
     * @param FaqRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        try{
            auth()->user()->faqs()->save(Faq::create($request->all()));
        }catch (\Exception $exception){
            dd($exception);
        }

        $faqs = Faq::pagination();

        if($request->ajax()){
            return view('includes.faqs.AllFaqs', compact('faqs'))->render();
        }else{
            return redirect(route('faqs.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Faq $faq)
    {
        if($request->ajax()){
            return json_encode($faq);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FaqRequest $request
     * @param  \App\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->revisions++;
        $faq->updated_by = Auth::user()->id;
        $faq->update($request->all());

        $faqs = Faq::pagination();

        if($request->ajax()){
            return view('includes.faqs.AllFaqs', compact('faqs'))->render();
        }else{
            return redirect(route('faqs.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        $faq->delete();
        Session::flash('danger', 'سوال متداول با موفقیت پاک شد');
        return redirect(route('faqs.index'));
//        if($request->ajax()){
//            try {
//                $faq->delete();
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $faqs = Faq::pagination();
//            return view('includes.faqs.AllFaqs', compact('faqs'))->render();
//        }
//
//        return redirect(route('faqs.index'));
    }

    public function multiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        Faq::destroy($ids);
        Session::flash('danger', 'سوالات متداول با موفقیت پاک شدند');
        return redirect(route('faqs.index'));
//        if($request->ajax()){
//            $input = $request->all();
//            $ids = explode(',', $input['ids']);
//            try {
//                foreach ($ids as $id){
//                    $deleteFaq = FAQ::findOrFail($id);
//                    $deleteFaq->update(['updated_by' => Auth::user()->id]);
//                    $deleteFaq->delete();
//                }
//            }catch (\Exception $exception){
//                dd($exception->getMessage());
//            }
//
//            $faqs = FAQ::pagination();
//            return view('Includes.AllFaqs', compact('faqs'))->render();
//        }
    }
}
