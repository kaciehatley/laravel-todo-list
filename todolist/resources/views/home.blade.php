@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Task Management System</h1>
                <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-danger btn-lg text-white" data-toggle="modal" data-target="#myModal">Create New Task</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 border-right">
                            <h2 class="text-center">Incomplete</h2>
                            <table id="dataTable1" class="table table-hover">
                                <thead class="thead-dark">
                                <th scope="col">Task</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Created</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="d-none">Details</th>
                                <th scope="col" class="d-none">Updated_At</th>
                                <th scope="col" class="d-none">Task ID</th>
                                </thead>
                            <tbody>
                            @foreach($incompleted as $incomplete)
                            <tr class="edit1" data-toggle="modal" data-target="#incompleteInfo" data-taskID={{$incomplete->id}}>
                                <th scope="row">{{ $incomplete->task}}</th>
                                <td>{{ $incomplete->priority }}</td>
                                <td>{{ \Carbon\Carbon::parse($incomplete->created_at)->diffForHumans() }}</td>
                                <td><div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
</div></td>
<td class="d-none">{{ $incomplete->details }}</td>
<td class="d-none">{{ \Carbon\Carbon::parse($incomplete->updated_at)->diffForHumans() }}</td>
<td class="d-none">{{ $incomplete->id }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                                <!-- For each statement looping through incomplete tasks -->
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Complete</h2>
                            <table id="datatable" class="table table-hover">
                                <thead class="thead-dark">
                                    <th scope="col">Task</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="d-none">Details</th>
                                    <th scope="col" class="d-none">Updated_At</th>
                                    <th scope="col" class="d-none">Task ID</th>
                                </thead>
                                <tbody>
                                @foreach($completed as $complete)
                                <tr class="edit" data-toggle="modal" data-target="#taskInfo">
                                <th scope="row">{{ $complete->task}}</th>
                                <td>{{ $complete->priority }}</td>
                                <td>{{ \Carbon\Carbon::parse($complete->created_at)->diffForHumans() }}</td>
                                <td><div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=1 id="defaultCheck1" checked>
                                </div></td>
<td class="d-none">{{ $complete->details }}</td>
<td class="d-none">{{ \Carbon\Carbon::parse($complete->updated_at)->diffForHumans() }}</td>
<td class="d-none">{{ $complete->id }}</td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                            <!-- For each statement looping through complete tasks -->
                            </div>
                        </div>
                    </div>

                    @yield('taskDiv')
                </div>
            </div>
        </div>
    </div>
</div>

                <!-- NEW TASK MODAL -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create New Task</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="/create" method="post">
                                    <div class="form-group">
                                        <label for="task">Task</label>
                                        <input id="task" class="form-control" type="text" name="task" placeholder="Take A Walk...">
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Task Details:</label>
                                        <textarea class="form-control" rows="5" name="details" id="details"></textarea>
                                    </div>
                                    <select class="form-control">
                                        <option>Important</option>
                                        <option>Urgent</option>
                                        <option>Ignore</option>
                                        <option>Optional</option>
                                    </select>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger mt-3">Add Task</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

        <!-- INCOMPLETE TASK MODAL -->
                <div id="incompleteInfo" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Task Title Here</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <form method="post" id="completeForm">
                            {{ csrf_field() }}
                            {{ method_field('patch')}}
                                <input name="completeTask_ID" type="hidden" id="completeTask_ID" value="">
                                <button type="submit" class="btn btn-dark mb-3"><i class="fa fa-check mr-1" aria-hidden="true"></i>Mark As Complete</button>
                            </form>
                                
                                <form method="post" id="updateIncForm">
                                {{ csrf_field() }}
                                {{ method_field('patch')}}
                                <input name="task_ID" type="hidden" id="task_ID" value="">
                                    <div class="form-group">
                                        <label for="task">Task</label>
                                        <input id="updateIncTask" class="form-control" type="text" name="incompleteTask" placeholder="Take A Walk...">
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Task Details</label>
                                        <textarea class="form-control" rows="5" name="incompleteDetails" id="updateIncDetails"></textarea>
                                    </div>
                                    <label for="priority">Priority</label>
                                    <select class="form-control" id="updateIncPriority">
                                        <option>Important</option>
                                        <option>Urgent</option>
                                        <option>Ignore</option>
                                        <option>Optional</option>
                                    </select>
                                    <p class="mt-2" id="incCreated"></p>
                                    <p id="incUpdated"></p>
                                    <p id="updateTaskID" class="d-none"></p>
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-edit mr-1" aria-hidden="true"></i>Update Task</button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete Task</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal -->


                                            <!-- COMPLETE TASK MODAL -->
                                            <div id="taskInfo" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Task Title Here</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="/updatetask" method="post" id="editForm">
                                {{ method_field('PUT')}}
                                    <div class="form-group">
                                        <label for="task">Task</label>
                                        <input id="updateTask" class="form-control" type="text" name="task" placeholder="Take A Walk...">
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Task Details</label>
                                        <textarea class="form-control" rows="5" name="details" id="updateDetails"></textarea>
                                    </div>
                                    <label for="priority">Priority</label>
                                    <select class="form-control" id="updatePriority">
                                        <option>Important</option>
                                        <option>Urgent</option>
                                        <option>Ignore</option>
                                        <option>Optional</option>
                                    </select>
                                    {{ csrf_field() }}
                                    <p class="mt-2" id="createdOn"></p>
                                    <p id="updatedOn"></p>
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-edit mr-1" aria-hidden="true"></i>Update Task</button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete Task</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End modal -->

@endsection
