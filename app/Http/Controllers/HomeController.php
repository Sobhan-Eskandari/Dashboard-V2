<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Inbox;
use App\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('home');
        $todos = Todo::all();
        $comments = Comment::latest()->take(4)->get();
        $inboxes = Inbox::latest()->take(4)->get();
        return view('dashboard.home.index', compact('todos', 'inboxes', 'comments'));
    }
}
