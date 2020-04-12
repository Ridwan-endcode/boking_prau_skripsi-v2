@extends('layouts.frontLayout.front_desain')

@section('content')
    

        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h2 class="page-title">Mulai Boking Pendakian</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Jalur Pendakian</li>
                    </ol>
                </div>
            </div>
            <!-- end row -->
        </div>

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

            <div class="col-xl-12">
                <div class="card m-b-30 text-white bg-info">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <h2>
                                Pilih Jalur pendakian yang ingin anda lewati
                            </h2>
                            <footer class="blockquote-footer text-white font-12">
                                Jalur pendakian ini yang akan anda lewati dan memvalidasi tiket anda <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>

        
        <div class="row">
					@if(count($jalur_pendakians) > 0)
					@foreach($jalur_pendakians as $jalur_pendakian)
            <div class="col-md-6 col-xl-3">
                <!-- Simple card -->
                <div class="card m-b-30">
                    <img class="card-img-top img-fluid" src="{{ asset("backend/images/image_peta_jalur/$jalur_pendakian->image_peta_jalur") }}" alt="Card image cap">
                    <div class="card-body">
												<h4 class="card-title font-16 mt-0">{{ $jalur_pendakian->nama_jalur }}</h4>
												<p class="card-text">Alamat :{{ $jalur_pendakian->alamat_jalur }}</p>
                    <a href="{{ url('/booking-pilih-jalurpendakian-jadwal/'.$jalur_pendakian->id) }}" class="btn btn-primary waves-effect waves-light">Pilih Jalur Pendakian</a>
                    </div>
								</div>
								
							</div><!-- end col -->
							@endforeach
							@else
								<p>Jalur Pendakian Blum Tersedia</p>
							@endif
        </div>





@endsection

