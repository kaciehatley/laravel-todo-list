@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h1>Tasks</h1></div>

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
