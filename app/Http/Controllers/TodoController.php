<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|unique:todos',
        ]);

        auth()->user()->addTodo(new Todo([
            'task' => $request->task,
            'done' => false
        ]));

        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        if ($request->ajax()) {
            if ($todo->done) {
                $todo->done = false;
                $todo->update();
                return response()->json(['response' => 'undone']);
            } else {
                $todo->done = true;
                $todo->update();
                return response()->json(['response' => 'done']);
            }
        }
        return response()->json(['response' => 'failure']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return back();
    }
}
