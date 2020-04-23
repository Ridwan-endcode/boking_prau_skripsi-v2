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
   <!-- Basic -->
   
  
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
   <meta name="Booking Gunung Prau" content="">

   <!-- Site Icons -->
   <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon" />
   <link rel="apple-touch-icon" href="{{ asset('frontend/images/apple-touch-icon.png') }}">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
   <!-- Site CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/css/versions.css') }}">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

   <!-- Modernizer for Portfolio -->
   <script src="{{ asset('frontend/js/modernizer.js') }}"></script>

    @yield('app_css')

    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e7a354469e9320caabc851a/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script> --}}
    <!--End of Tawk.to Script-->


</head>

<body class="host_version"> 

    @include('layouts.frontLayout.front_heder')

    @yield('content')

    @include('layouts.frontLayout.front_footer')
    <!-- ALL JS FILES -->
    <script src="{{ asset('frontend/js/all.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/timeline.min.js') }}"></script>
    <script>
        timeline(document.querySelectorAll('.timeline'), {
            forceVerticalMode: 700,
            mode: 'horizontal',
            verticalStartPosition: 'left',
            visibleItems: 4
        });
    </script>

    @yield('app_js')


</body>

</html>