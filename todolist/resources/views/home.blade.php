@extends('layouts.app');
@include('modals');

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
                        <!-- Column of incomplete tasks -->
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
                                <!-- Foreach loop through each object (containing INCOMPLETE task info) returned from GET request -->
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
                        </div>
                        <!-- Column of complete tasls -->
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
                                <!-- Foreach loop through each object (containing COMPLETE task info) returned from GET request -->
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
            </div>
        </div>
    </div>
    <!-- Button triggers modal for deleted tasks -->
    <button type="button" class="btn btn-info btn-danger btn-lg text-white fixed-bottom mb-3 ml-3" data-toggle="modal" data-target="#deletedModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
</div>

<!-- CREATE NEW TASK MODAL -->
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
                    <select name="priority" class="form-control">
                        <!-- Local Options -->
                        <option value=1>Urgent</option>
                        <option value=2>Important</option>
                        <option value=3>Ignore</option>
                        <option value=4>Optional</option>
                        <!-- Deployed Options -->
                        <!-- <option value=1>Urgent</option>
                        <option value=11>Important</option>
                        <option value=21>Ignore</option>
                        <option value=31>Optional</option> -->
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
@endsection