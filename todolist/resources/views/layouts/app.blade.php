<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>To Do List</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white">
                    To Do List
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
<script>
    function hello(id) {
        console.log(id);
    }

    $(document).ready(function() {
        var table = $('#datatable').DataTable();
        var table1 = $('#dataTable1').DataTable();
        var checkbox=$('.checkBox');
        
        var completeBtn = $('#markAsComplete');
        var taskID = table1.data('taskID')

        // completeBtn.on('click', function() {
        //     console.log("I hear you!");
        //     $('#updateIncForm').attr('action', '/markComplete/', data[6]);
        //     $('#incompleteInfo').modal('show');
        // })

        // checkbox.on('click', function() {
        //     console.log("heyyyy");
        //     $tr = $(this).closest('tr');
        //     if($($tr).hasClass('child')) {
        //         $tr = $tr.prev('.parent');
        //     }

        //     var data = checkbox.row($tr).data();
        //     console.log("data:");
        //     console.log(data[0]);
        // })

        table.on('click', '.edit', function() {
            console.log("We Made it!")
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#updateTask').val(data[0]);
            $('#comTaskHeader').html(data[0]);
            $('#updateDetails').val(data[4]);
            $('#updatePriority').val(data[1]);
            $('#completedTask_ID').val(data[6]);
            $('#createdOn').html('Created: '+data[2]);
            $('#updatedOn').html('Last Updated: '+data[5]);

            $('#returnIncomplete').attr('action', '/markIncomplete/', data[6]);
            
            // $('editForm').attr('action', '/updatetask/'+data[0])
        })

        table1.on('click', '.edit1', function() {
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table1.row($tr).data();
            console.log(data);
            // console.log('taskID:'+taskID);

            $('#updateIncTask').val(data[0]);
            $('#incTaskHeader').html(data[0]);
            $('#updateIncDetails').val(data[4]);
            $('#updateIncPriority').val(data[1]);
            $('#updateIncPriority').val(data[1]);
            $('#incCreated').html('Created: '+data[2]);
            $('#incUpdated').html('Last Updated: '+data[5]);
            $('#updateTaskID').html(data[6]);
            $('#task_ID').val(data[6]);
            $('#completeTask_ID').val(data[6]);
            $('#deleteIncID').val(data[6]);

            $('#completeForm').attr('action', '/markComplete/', data[6]);
            $('#updateIncForm').attr('action', '/update/', data[6]);
            $('#deleteInc').attr('action', '/delete/', data[6]);
            $('#incompleteInfo').modal('show');

        })
    })
</script>
<script src="https://use.fontawesome.com/65f9d13591.js"></script>
</html>
