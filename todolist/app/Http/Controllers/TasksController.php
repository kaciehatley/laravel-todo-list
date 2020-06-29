<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $incomplete = DB::table('tasks')
        ->join('priorities', 'tasks.priorityID', "=", 'priorities.priorityID')
        ->where('completed', 0)
        ->where('userID', $id)
        ->get();
        $complete = DB::table('tasks')
        ->join('priorities', 'tasks.priorityID', "=", 'priorities.priorityID')
        ->where('completed', 1)
        ->where('userID', $id)
        ->get();
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
        $id = \Auth::user()->id;
        
        $tasks = new Task();
        $tasks->task = $_POST['task'];
        $tasks->userID = $id;
        $tasks->details = $_POST['details'];
        $tasks->priorityID = $_POST['priority'];
        $tasks->completed = 0;

        $tasks->save();

        return redirect('/');
    }
    public function markComplete(Request $request)
    {
        //
        $tasks = Task::findOrFail($request->completeTask_ID);
        $tasks->completed = 1;

        $tasks->save();

        return redirect('/');
    }

    public function markIncomplete(Request $request)
    {
        //
        $tasks = Task::findOrFail($request->completedTask_ID);
        $tasks->completed = 0;

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'task'=>'required'
        // ]);
        $tasks = Task::findOrFail($request->task_ID);
        $tasks->task = $request->get('incompleteTask');
        $tasks->details = $request->get('incompleteDetails');

        $tasks->save();

        return redirect('/');

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