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

    // GENERATES DATA WHICH POPULATES INCOMPLETE ND COMPLETE TASKS TABLES

    public function index()
    {
        $id = \Auth::user()->id;
        $incomplete = DB::table('tasks')
        ->join('priorities', 'tasks.priorityID', "=", 'priorities.priorityID')
        ->where('completed', 0)
        ->where('deleted_at', NULL)
        ->where('userID', $id)
        ->get();
        $complete = DB::table('tasks')
        ->join('priorities', 'tasks.priorityID', "=", 'priorities.priorityID')
        ->where('completed', 1)
        ->where('deleted_at', NULL)
        ->where('userID', $id)
        ->get();
        $deleted = DB::table('tasks')
        ->join('priorities', 'tasks.priorityID', "=", 'priorities.priorityID')
        ->whereNotNull('deleted_at')
        ->where('userID', $id)
        ->get();
        // $incomplete = DB::table('tasks')->where('completed', 0)->get();
        // $complete = DB::table('tasks')->where('completed', 1)->get();

        return view('home', [
            'incompleted' => $incomplete,
            'completed' => $complete,
            'deletedTasks' => $deleted,

        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // CRESTES NEW TASK

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

    // UPDATES COMPLETION STATUS ON CLICK OF CHECKBOX

    public function checkToComplete(Request $request)
        {   
            $completedStatus = $request->completed;
            $tasks = Task::findOrFail($request->id);
            //
            if($completedStatus==1) {
                $tasks->completed = 0;
                $tasks->save();
            }
            else if ($completedStatus==0) {
                $tasks->completed = 1;
                $tasks->save();
            }
            return redirect('/');
        }

    // UPDATES TASK TO COMPLETE

    public function markComplete(Request $request)
    {
        //
        $tasks = Task::findOrFail($request->completeTask_ID);
        $tasks->completed = 1;

        $tasks->save();

        return redirect('/');
    }

    // UPDATES TASK TO INCOMPLETE

    public function markIncomplete(Request $request)
    {
        //
        $tasks = Task::findOrFail($request->completedTask_ID);
        $tasks->completed = 0;

        $tasks->save();

        return redirect('/');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // UPDATE THE TASK INFORMATION

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

    // DELETE TASK

    public function delete(Request $request)
    {

        $tasks=Task::findOrFail($request->deleteIncID)->delete();

        return redirect('/');

    }
}