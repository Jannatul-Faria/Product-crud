<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User login</title>
    <!-- loader-->

    <link href="{{ asset('assets/css') }}/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('assets/js') }}/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images') }}/favicon.ico" type="image/x-icon">
    <!--Full Calendar Css-->
    <link href="{{ asset('assets/plugins') }}/fullcalendar/css/fullcalendar.min.css" rel='stylesheet' />
    <!-- Vector CSS -->
    <link href="{{ asset('assets/plugins') }}/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{ asset('assets/plugins') }}/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css') }}/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('assets/css') }}/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css') }}/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('assets/css') }}/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('assets/css') }}/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->
    <!-- Start wrapper-->
    <div id="wrapper">
        @yield('content')
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->



        @include('backend.Components.rightside')

    </div><!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js') }}/jquery.min.js"></script>
    <script src="{{ asset('assets/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/js') }}/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="{{ asset('assets/plugins') }}/simplebar/js/simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('assets/js') }}/sidebar-menu.js"></script>
    <!-- loader scripts -->
    <script src="{{ asset('assets/js') }}/jquery.loading-indicator.js"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('assets/js') }}/app-script.js"></script>
    <!-- Chart js -->

    <script src="{{ asset('assets/plugins') }}/Chart.js/Chart.min.js"></script>

    <!-- Index js -->
    <script src="{{ asset('assets/js') }}/index.js"></script>
    <!-- Full Calendar -->
    <script src='{{ asset('assets/plugins') }}/fullcalendar/js/moment.min.js'></script>
    <script src='{{ asset('assets/plugins') }}/fullcalendar/js/fullcalendar.min.js'></script>
    <script src="{{ asset('assets/plugins') }}/fullcalendar/js/fullcalendar-custom-script.js"></script>

</body>

</html>
