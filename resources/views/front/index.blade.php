@extends('layouts.frontLayout.front_desain')

@section('content')
    

<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div id="home" class="first-section" style="background-image:url('{{ asset('frontend/images/slider-01.jpg')}}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-right">
                                <div class="big-tagline">
                                    <h2><strong>Gunung Prau </strong> Jawa Tenggah</h2>
                                    <p class="lead">Situs Booking Online Gunung Prau </p>
                                    
                                        <a href="{{ url('/booking-pilih-jalurpendakian') }}" class="hover-btn-new"><span>Mulai Booking Online</span></a>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <div class="carousel-item">
            <div id="home" class="first-section" style="background-image:url('{{ asset('frontend/images/slider-02.jpg')}}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-left">
                                <div class="big-tagline">
                                    <h2 data-animation="animated zoomInRight">Selamat Datang <strong> Pendaki Gunung Prau </strong></h2>
                                    <p class="lead" data-animation="animated fadeInLeft"> Dataran Tinggi Dieng </p>
                                    
                                        <a href="{{ url('/booking-pilih-jalurpendakian') }}" class="hover-btn-new"><span>Mulai Booking Online</span></a>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <div class="carousel-item">
            <div id="home" class="first-section" style="background-image:url('{{ asset('frontend/images/slider-03.jpg')}}');">
                <div class="dtab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <h2 data-animation="animated zoomInRight"><strong>Harap Membaca</strong> Tatacara Booking  </h2>
                                    <p class="lead" data-animation="animated fadeInLeft">Sistem Booking Online Gunung Prau</p>
                                        <a href="{{ url('/booking-pilih-jalurpendakian') }}" class="hover-btn-new"><span>Mulai Booking Online</span></a>
                                       
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div>
            </div><!-- end section -->
        </div>
        <!-- Left Control -->
        <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>






@endsection

