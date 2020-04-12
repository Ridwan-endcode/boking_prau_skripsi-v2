<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <script language='JavaScript'>
            var tulisan="Admin :: Sistem Boking Gunung Prau--";
            var kecepatan=100;var fress=null;function jalan() { document.title=tulisan;
            tulisan=tulisan.substring(1,tulisan.length)+tulisan.charAt(0);
            fress=setTimeout("jalan()",kecepatan);}jalan();
            </script>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico')}}">

    @yield('app_css')

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    {{-- <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
 



</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        

            @include('layouts.adminLayout.admin_header')

            @include('layouts.adminLayout.admin_sidebar')

            @yield('content')

            @include('layouts.adminLayout.admin_footer')


    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/js/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('/plugins/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('backend/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.js') }}" ></script>   
    <script src="{{ asset('backend/js/app.js') }}"></script>



    @yield('app_js')

</body>

</html>