<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Boking Prau</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
    
        <div class="wrapper-page">


                <div class="card-body">
                        <div class="">
                             @if (Session::has('flash_message_success'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Selamat Berhasil</strong> {!! session('flash_message_success') !!}
                            </div>
                            @endif
                            @if (Session::has('flash_message_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Ada Kesalahan !!   </strong>{!! session('flash_message_error') !!}
                            </div>
                            @endif
                        </div>
                    </div>

                <div class="card card-pages shadow-none">
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-light.png" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">SISTEM INFORMASI BOKING WISATA PENDAKIAN MELALUI ONLINE DIKAWASAN GUNUNG PRAU  DATARAN TINGGI DIENG JAWA TENGAH</h5>
                        <hr>
                        <h8 class="font-18 text-center">login untuk melanjutkan Admin Gunung Prau</h5>
    
                        <form class="form-horizontal m-t-30" method="POST" action="{{ url('administrator') }}"> @csrf
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Email</label>
                                    <input class="form-control" name="email" type="email" required placeholder="email">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>
    
                        
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
    
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('backend/js/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/js/app.js') }}"></script>
        
    </body>

</html>