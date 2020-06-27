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

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
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
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <thead class="thead-dark">
                                <th scope="col">Task</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Created</th>
                                <th scope="col">Status</th>
                                </tr>
                                </thead>
                            </thead>
                            <tbody>
                            @foreach($incompleted as $incomplete)
                            <!-- EXPERIMENTING HERE -->
                            <tr>
                                <th scope="row">{{ $incomplete->task}}</th>
                                <td>{{ $incomplete->priority }}</td>
                                <td>{{ \Carbon\Carbon::parse($incomplete->created_at)->diffForHumans() }}</td>
                                <td><div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
</div></td>
                                </tr>
                            @endforeach
                            <!-- SECOND Modal -->
                <div id="taskInfo" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Task Title Here</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="/create" method="post">
                                    <div class="form-group">
                                        <label for="task">Task</label>
                                        <input id="task" class="form-control" type="text" name="task" placeholder="Take A Walk...">
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Task Details</label>
                                        <textarea class="form-control" rows="5" name="details" id="details"></textarea>
                                    </div>
                                    <label for="priority">Priority</label>
                                    <select class="form-control">
                                        <option>Important</option>
                                        <option>Urgent</option>
                                        <option>Ignore</option>
                                        <option>Optional</option>
                                    </select>
                                    {{ csrf_field() }}
                                    <p class="mt-2">Created On: ...</p>
                                    <p>Last Updated: ...</p>
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-check mr-1" aria-hidden="true"></i>Mark As Complete</button>
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
                            </tbody>
                            </table>
                                <!-- For each statement looping through incomplete tasks -->
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Complete</h2>
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <th scope="col">Task</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Status</th>
                                </thead>
                                <tbody>
                                @foreach($completed as $complete)
                                <tr value="{{$complete->id}}" data-toggle="modal" data-target="#taskInfo" onclick="hello()">
                                <th scope="row">{{ $complete->task}}</th>
                                <td>{{ $complete->priority }}</td>
                                <td>{{ \Carbon\Carbon::parse($complete->created_at)->diffForHumans() }}</td>
                                <td><div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
</div></td>
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

@endsection
