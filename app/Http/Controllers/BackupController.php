<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\Facades\jDateTime;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.backup.index');
    }

    public function posts(Request $request)
    {
        return $this->export($request, 'Post');
    }

    public function inbox(Request $request)
    {
        return $this->export($request, 'Inbox');
    }

    public function users(Request $request)
    {
        return $this->export($request, 'User');
    }

    public function comments(Request $request)
    {
        return $this->export($request, 'Comment');
    }

    /**
     * @param Request $request
     * @param $model
     * @return mixed
     */
    private function export(Request $request, $model)
    {
        $from = explode('/', $request['from']);
        $start = implode('-', jDateTime::toGregorian($from[0], $from[1], $from[2])) . ' 00:00:00';

        $till = explode('/', $request['till']);
        $end = implode('-', jDateTime::toGregorian($till[0], $till[1], $till[2])) . ' 23:59:59';

        $requestedModel = '\\App\\' . $model;

        $result = $requestedModel::whereBetween('created_at', [$start, $end])->get()->toArray();

        return Excel::create('All_' . $model, function($excel) use ($result) {
            $excel->sheet('mySheet', function($sheet) use ($result)
            {
                $sheet->fromArray($result);
            });
        })->export($request['type']);
    }
}
