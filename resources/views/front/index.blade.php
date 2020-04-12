@extends('layouts.frontLayout.front_desain')

@section('content')
    
{{-- 
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- end row -->
        </div> --}}

        
{{-- Banner Mulai --}}
<div>
    <div class="card m-b-20">
        <div class="card-body">

            <h4 class="mt-0 header-title text-center">Selamat datang</h4>
            <p class="sub-title text-center">Situs Boking Online Gunung Prau Dataran Tinggi dieng jawa tengah</p>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid mx-auto" src="{{ asset('frontend/images/small/img-3.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid mx-auto" src="{{ asset('frontend/images/small/img-2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid mx-auto" src="{{ asset('frontend/images/small/img-1.jpg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div> <!-- end col -->






@endsection

