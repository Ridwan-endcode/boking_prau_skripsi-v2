<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <script language='JavaScript'>
        var tulisan="--Boking Online Gunung Prau--";
        var kecepatan=100;var fress=null;function jalan() { document.title=tulisan;
        tulisan=tulisan.substring(1,tulisan.length)+tulisan.charAt(0);
        fress=setTimeout("jalan()",kecepatan);}jalan();
        </script>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/morris/morris.css') }}">

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css">

    @yield('app_css')

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e7a354469e9320caabc851a/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->


</head>

<body style="background: radial-gradient(#cce6ff, #FFF);" >

    @include('layouts.frontLayout.front_heder')

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->

    @yield('content')

    
</div>
<!-- end container-fluid -->
</div>
<!-- end wrapper -->


    @include('layouts.frontLayout.front_footer')

    <!-- jQuery  -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('frontend/js/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('/plugins/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('frontend/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('frontend/js/app.js') }}"></script>

    @yield('app_js')


</body>

</html>