@extends('layouts.frontLayout.front_desain')

@section('content')
    
<div class="all-title-box">
    <div class="container text-center">
        <h1>Pilih Jalur pendakian yang ingin anda lewati<span class="m_1">  Jalur pendakian ini yang akan anda lewati dan memvalidasi tiket anda</span></h1>
    </div>
</div>

<div id="overviews" class="section wb">
    <div class="container">
            <div class="card-body">
                    <div class="">
                         @if (Session::has('flash_message_success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{!! session('flash_message_success') !!}</strong> 
                        </div>
                        @endif
                        @if (Session::has('flash_message_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{!! session('flash_message_error') !!}</strong>
                        </div>
                        @endif
                    </div>
                </div>
        <div class="row"> 

        @if(count($jalur_pendakians) > 0)
					@foreach($jalur_pendakians as $jalur_pendakian)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="course-item">
                    <div class="image-blog">
                        <img src="{{ asset("backend/images/image_peta_jalur/$jalur_pendakian->image_peta_jalur") }}" alt="" class="img-fluid">
                    </div>
                    <div class="course-br">
                        <div class="course-title">
                            <h2><a href="{{ url('/booking-pilih-jalurpendakian-jadwal/'.$jalur_pendakian->id) }}" title="">{{ $jalur_pendakian->nama_jalur }}</a></h2>
                        </div>
                        <div class="course-desc">
                            <p>Alamat :{{ $jalur_pendakian->alamat_jalur }} </p>
                        </div>
                    </div>
                    <div class="course-meta-bot">
                        <div class="blog-button text-center">
                            <a class="hover-btn-new orange" href="{{ url('/booking-pilih-jalurpendakian-jadwal/'.$jalur_pendakian->id) }}"><span>Pilih Jalur</span></a>
                          </div>
                    </div>
                </div>
            </div><!-- end col -->
            @endforeach
            @else
              <p>Jalur Pendakian Blum Tersedia</p>
            @endif
          


        </div><!-- end row -->			
        
        <hr class="hr3"> 
  
    </div><!-- end container -->
</div><!-- end section -->


@endsection

