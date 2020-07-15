<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>To Do List</title>

    <!-- Scripts -->
    <!-- <script src="{{ secure_asset('js/app.js') }}" defer></script> -->
    <!-- Local Script Link -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Light_green_check.svg/1024px-Light_green_check.svg.png">

    <!-- Styles -->
    <!-- <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- Local Style Link -->
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
<!-- jQuery Script -->
<script
  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
  crossorigin="anonymous"></script>
  <!-- Data tables scripts -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
<script>

    $(document).ready(function() {
        // Running DataTables to allow sort and search of tables
        var compTaskTable = $('#datatable').DataTable();
        var incompTaskTable = $('#dataTable1').DataTable();
        var deletedTable = $('#deletedTable').DataTable();
        var checkToComplete = $('#checkToComp');

        checkToComplete.on('click', function() {
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = incompTaskTable.row($tr).data();

            var id = data[6];

            $('#'+id).val(id);

            // $('#checkCompForm').attr('action', '/checkComplete/', data[6]);
            console.log(data);
        })
      
        // When user clicks on row, task data is pulled and rendered in modal
        incompTaskTable.on('click', '.edit1', function() {
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            // Storing current selected task's data
            var data = incompTaskTable.row($tr).data();

            // Task name
            $('#updateIncTask').val(data[0]);
            $('#incTaskHeader').html(data[0]);
            // Task Details
            $('#updateIncDetails').val(data[4]);
            // Task Priority
            $('#updateIncPriority').val(data[1]);
            // Timestamps
            $('#incCreated').html('Created: '+data[2]);
            $('#incUpdated').html('Last Updated: '+data[5]);
            // Task ID
            $('#updateTaskID').html(data[6]);
            $('#task_ID').val(data[6]);
            $('#completeTask_ID').val(data[6]);
            $('#deleteIncID').val(data[6]);

            // Sets the action of forms in incomplete tasks modal
            $('#completeForm').attr('action', '/markComplete/', data[6]);
            $('#updateIncForm').attr('action', '/update/', data[6]);
            $('#deleteInc').attr('action', '/delete/', data[6]);
        })

        compTaskTable.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            // Storing current selected task's data
            var data = compTaskTable.row($tr).data();

            // Task name
            $('#updateTask').val(data[0]);
            $('#comTaskHeader').html(data[0]);
            // Task Details
            $('#updateDetails').val(data[4]);
            // Task Priority
            $('#updatePriority').val(data[1]);
            // Task ID
            $('#completedTask_ID').val(data[6]);
            // Timestamps
            $('#createdOn').html('Created: '+data[2]);
            $('#updatedOn').html('Last Updated: '+data[5]);

            // Sets the action of form containing "Return To Incomplete" button
            $('#returnIncomplete').attr('action', '/markIncomplete/', data[6]);
            
        })

        // STILL IN PRODUCTION

        // var checkbox=$('.checkBox');    
        // var completeBtn = $('#markAsComplete');
        // var taskID = incompTaskTable.data('taskID')

        // completeBtn.on('click', function() {
        //     $('#updateIncForm').attr('action', '/markComplete/', data[6]);
        //     $('#incompleteInfo').modal('show');
        // })

        // checkbox.on('click', function() {
        //     $tr = $(this).closest('tr');
        //     if($($tr).hasClass('child')) {
        //         $tr = $tr.prev('.parent');
        //     }

        //     var data = checkbox.row($tr).data();
        //     console.log("data:");
        //     console.log(data[0]);
        // })

    })
</script>
<script src="https://use.fontawesome.com/65f9d13591.js"></script>
</html>
