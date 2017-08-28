<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutboxRequest;
use App\Inbox;
use App\Mail\AnswerInboxMessage;
use App\Outbox;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class OutboxController extends Controller
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
            $outboxes = Outbox::search($request->request('query'))->orderBy('created_at', 'desc')->paginate(8);
            $outboxes->load(['inbox', 'user']);
        }else{
            $outboxes = Outbox::with(['inbox', 'user'])->orderBy('created_at', 'desc')->paginate(8);
        }

        if ($request->ajax()) {
            return view('includes.outboxes.AllOutboxes', compact('outboxes'))->render();
        }

        return view('dashboard.messages.outbox.index', compact('outboxes'));
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
     * @param OutboxRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutboxRequest $request)
    {
        try{
            $inbox = Inbox::findOrFail($request['inbox_id']);
            $inbox->status = 3;
            $inbox->answered_by = Auth::user()->id;
            $inbox->answered_at = Carbon::now();
            $inbox->save();
            auth()->user()->outboxes()->save(Outbox::create($request->all()));
            Mail::to($request['email'])->send(new AnswerInboxMessage($request->all()));
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        Session::flash('success', 'ایمیل با موفقیت ارسال شد');
        return redirect(route('inbox.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function show(Outbox $outbox)
    {
        return view('dashboard.messages.outbox.show', compact('outbox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Outbox $outbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outbox $outbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Outbox $outbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Outbox $outbox)
    {
        $outbox->delete();
        Session::flash('danger', 'پیام مورد نظر با موفقیت پاک شد');
        return redirect(route('outbox.index'));
//        try {
//            $outbox->delete();
//        }catch (\Exception $exception){
//            dd($exception->getMessage());
//        }
//
//        $outboxes = Outbox::pagination(URL::to('/outbox'));
//
//        if($request->ajax()){
//            return view('includes.outboxes.AllOutboxes', compact('outboxes'))->render();
//        }else{
//            return redirect(route('outbox.index'));
//        }
    }

    public function multiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        try {
            Outbox::destroy($ids);
//            foreach ($ids as $id){
//                Outbox::findOrFail($id)->delete();
//            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        Session::flash('danger', 'پیام های مورد نظر با موفقیت پاک شد');
        return redirect(route('outbox.index'));

//        $outboxes = Outbox::pagination(URL::to('/outbox'));

//        if($request->ajax()){
//            return view('includes.outboxes.AllOutboxes', compact('outboxes'))->render();
//        }else{
//            return redirect(route('outbox.index'));
//        }
    }

    public function trash(Request $request)
    {
        $outboxes = Outbox::with(['inbox', 'user'])->onlyTrashed()->orderBy('created_at', 'desc')->paginate(8);

        if ($request->ajax()) {
            return view('includes.outboxes.AllOutboxesTrash', compact('outboxes'))->render();
        }

        return view('dashboard.messages.outbox.trash', compact('outboxes'));
    }

    public function forceDestroy(Request $request, $id)
    {
        try {
            Outbox::onlyTrashed()->findOrFail($id)->forceDelete();
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        Session::flash('danger', 'پیام مورد نظر به صورت دائمی پاک شد');
        return redirect(route('outbox.trash'));

//        $outboxes = Outbox::pagination(URL::to('/outbox/trash'));
//
//        if($request->ajax()){
//            return view('includes.outboxes.AllOutboxesTrash', compact('outboxes'))->render();
//        }else{
//            return redirect(route('outbox.trash'));
//        }
    }

    public function forceMultiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        try {
            foreach ($ids as $id){
                Outbox::onlyTrashed()->findOrFail($id)->forceDelete();
            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        Session::flash('danger', 'پیام های مورد نظر به صورت دائمی پاک شدند');
        return redirect(route('outbox.trash'));
//        $outboxes = Outbox::pagination(URL::to('/outbox/trash'));
//
//        if($request->ajax()){
//            return view('includes.outboxes.AllOutboxesTrash', compact('outboxes'))->render();
//        }else{
//            return redirect(route('outbox.trash'));
//        }
    }

    public function restore(Request $request, $id)
    {
        $outbox = Outbox::onlyTrashed()->findOrFail($id);

        try {
            if(is_null($outbox->inbox->deleted_at)){
                $outbox->restore();
            }else{
                /**
                 *      couldn't restore because it has no inbox
                 */
            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        Session::flash('success', 'پیام مورد نظر بازگردانی شد');
        return redirect(route('outbox.trash'));
//        $outboxes = Outbox::pagination(URL::to('/outbox/trash'));
//
//        if($request->ajax()){
//            return view('includes.outboxes.AllOutboxesTrash', compact('outboxes'))->render();
//        }else{
//            return redirect(route('outbox.trash'));
//        }
    }
}
