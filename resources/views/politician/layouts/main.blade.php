<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('admin/assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('admin/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <title>@yield('title')</title>
</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        @include('politician.layouts.sidebar')
      
        @include('politician.layouts.header')

        <!-- Left side column. contains the logo and sidebar -->

        @yield('content')
        @include('politician.layouts.footer')
        @include('politician.layouts.theme')


        <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!--plugins-->
        <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('admin/assets/plugins/validation/validation-script.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @include('politician.layouts.validation')
        @stack('js')
        {{-- <script>
            $(document).ready(function() {
                $('#Transaction-History').DataTable({
                    lengthMenu: [
                        [6, 10, 20, -1],
                        [6, 10, 20, 'Todos']
                    ]
                });
            });
        </script> --}}
        <script>
            $(document).ready(function() {
                $('#example2').DataTable({
                    "lengthMenu": [
                        [10, 25, 50, -1],
                        ["10", "25", "50", "All"]
                    ],
                    "searching": true,
                    "paging": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "scrollX": true, // Enables horizontal scroll bar for smaller screens
                    "responsive": false // Prevents hiding columns automatically
                });
            });
        </script>

        <!--app JS-->
        <script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>

</html>
