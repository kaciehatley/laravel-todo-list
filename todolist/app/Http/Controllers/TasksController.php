<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomplete = DB::table('tasks')->join('priorities', 'tasks.priorityID', "=", 'priorities.id')->where('completed', 0)->get();
        $complete = DB::table('tasks')->join('priorities', 'tasks.priorityID', "=", 'priorities.id')->where('completed', 1)->get();

        // $incomplete = DB::table('tasks')->where('completed', 0)->get();
        // $complete = DB::table('tasks')->where('completed', 1)->get();

        return view('home', [
            'incompleted' => $incomplete,
            'completed' => $complete,

        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tasks = new Task();
        $tasks->task = $_POST['task'];
        $tasks->userID = $_POST['details'];
        $tasks->details = $_POST['details'];
        $tasks->priorityID = $_POST['details'];
        $tasks->completed = $_POST['details'];

        $tasks->save();

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
