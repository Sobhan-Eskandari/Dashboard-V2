<?php

namespace App\Http\Controllers;

use App\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class InboxController extends Controller
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
            $inboxes = Inbox::search($request->input('query'))->orderBy('created_at', 'desc')->paginate(8);
        }else{
            $inboxes = Inbox::orderBy('created_at', 'desc')->paginate(8);
        }

        if ($request->ajax()) {
            return view('includes.inboxes.AllInboxes', compact('inboxes'))->render();
        }

        return view('dashboard.messages.inbox.index', compact('inboxes'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
        $inbox->status = 2;
        $inbox->seen_by = Auth::user()->id;
        $inbox->save();
        return view('dashboard.messages.inbox.show', compact('inbox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Inbox $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Inbox $inbox)
    {
        try {
            foreach($inbox->outboxes as $outbox){
                $outbox->delete();
            }
            $inbox->updated_by = Auth::user()->id;
            $inbox->save();
            $inbox->delete();
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        $inboxes = Inbox::pagination(URL::to('/inbox'));

        if($request->ajax()){
            return view('includes.inboxes.AllInboxes', compact('inboxes'))->render();
        }else{
            Session::flash('danger', 'پیام مورد نظر با موفقیت پاک شد');
            return redirect(route('inbox.index'));
        }
    }

    public function multiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        try {
            foreach ($ids as $id){
                $deleteInbox = Inbox::findOrFail($id);
                foreach($deleteInbox->outboxes as $outbox){
                    $outbox->delete();
                }
                $deleteInbox->updated_by = Auth::user()->id;
                $deleteInbox->save();
                $deleteInbox->delete();
            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        $inboxes = Inbox::pagination(URL::to('/inbox'));
        if($request->ajax()){
           return view('includes.inboxes.AllInboxes', compact('inboxes'))->render();
        }else{
            Session::flash('danger', 'پیام های مورد نظر با موفقیت پاک شد');
            return redirect(route('inbox.index'));
        }
    }

    public function trash(Request $request)
    {
        $inboxes = Inbox::onlyTrashed()->orderBy('created_at', 'desc')->paginate(8);

        if ($request->ajax()) {
            return view('includes.inboxes.AllInboxesTrash', compact('inboxes'))->render();
        }

        return view('dashboard.messages.inbox.trash', compact('inboxes'));
    }

    public function forceDestroy(Request $request, $id)
    {
        $inbox = Inbox::onlyTrashed()->findOrFail($id);

        try {
            foreach($inbox->outboxes as $outbox){
                $outbox->forceDelete();
            }
            $inbox->forceDelete();
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        $inboxes = Inbox::pagination(URL::to('/inbox/trash'));

        if($request->ajax()){
            return view('includes.inboxes.AllInboxesTrash', compact('inboxes'))->render();
        }else{
            return redirect(route('inbox.trash'));
        }
    }

    public function forceMultiDestroy(Request $request)
    {
        $ids = explode(',', $request['ids']);
        try {
            foreach ($ids as $id){
                $deleteInbox = Inbox::onlyTrashed()->findOrFail($id);
                foreach($deleteInbox->outboxes as $outbox){
                    $outbox->forceDelete();
                }
                $deleteInbox->forceDelete();
            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        $inboxes = Inbox::pagination(URL::to('/inbox/trash'));

        if($request->ajax()){
            return view('includes.inboxes.AllInboxesTrash', compact('inboxes'))->render();
        }else{
            return redirect(route('inbox.trash'));
        }
    }

    public function restore(Request $request, $id)
    {
        $inbox = Inbox::onlyTrashed()->findOrFail($id);
        try {
            foreach($inbox->outboxes as $outbox){
                $outbox->restore();
            }
            $inbox->updated_by = Auth::user()->id;
            $inbox->save();
            $inbox->restore();
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        $inboxes = Inbox::pagination(URL::to('/inbox/trash'));

        if($request->ajax()){
            return view('includes.inboxes.AllInboxesTrash', compact('inboxes'))->render();
        }else{
            return redirect(route('inbox.trash'));
        }
    }
}
