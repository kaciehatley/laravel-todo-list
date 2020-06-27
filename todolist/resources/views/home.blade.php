@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Tasks</h1>
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
                                <form>
                                    <div class="form-group">
                                        <label for="task">Task</label>
                                        <input id="task" class="form-control" type="text" placeholder="Take A Walk...">
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Task Details:</label>
                                        <textarea class="form-control" rows="5" id="details"></textarea>
                                    </div>
                                    <select class="form-control">
                                        <option>Important</option>
                                        <option>Urgent</option>
                                        <option>Ignore</option>
                                        <option>Optional</option>
                                    </select>
                                    <button type="submit" class="btn btn-danger mt-2">Add Task</button>
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
                            <table class="table">
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
                                <tr>
                                <th scope="row">This Is An Example</th>
                                <td>Of How</td>
                                <td>The Rows</td>
                                <td>Will Look</td>
                                </tr>
                            </tbody>
                            </table>
                                <!-- For each statement looping through incomplete tasks -->
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-center">Complete</h2>
                            <table class="table">
                                <thead class="thead-dark">
                                    <th scope="col">Task</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">This Is An Example</th>
                                    <td>Of How</td>
                                    <td>The Rows</td>
                                    <td>Will Look</td>
                                    </tr>
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
