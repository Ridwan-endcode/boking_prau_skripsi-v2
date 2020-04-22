<?php 
use App\Pendaki;
use App\Order;

?>

@extends('layouts.frontLayout.front_desain')

@section('content')
    

        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Pilih Jadwal Pendakian</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/booking-pilih-jalurpendakian') }}">Jalur Pendakian</a></li>
                        <li class="breadcrumb-item active">Jadwal Pendakian</li>
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

        
      
            
        <div class="row">
            <div class="col-lg-12">
              {{-- {{ $jalur_pendakian->count() }} <br>
              {{ date('M j, Y') }} --}}
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Jadwal Pendakian Yang tersedia di Jalur Pendakian {{ $jalur_pendakian->nama_jalur }} </h4>
                        <p class="sub-title">
                           
												</p>
                        
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Tanggal Pendakian</th>
                                        <th>Kuota</th>
                                        <th>Booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(count($jadwals) > 0)
                                    @foreach($jadwals as $jadwal)
																		<form class="" method="post" action="{{ url('/booking-add-order-ketua') }}" enctype="multipart/form-data" > @csrf  
                                        <tr>
																				<td>{{ date('d F Y', strtotime($jadwal->tgl_jadwal)) }}</td>
																				<td>
                                            <div class="font-14">
                                              <?php $pendakis = Pendaki::where(['id_jadwal' => $jadwal->id])->where(['status' => 1])->count(); ?>
                                              @if ($jadwal->kuota <= $pendakis )
                                              <span class="badge badge-pill badge-danger">
                                                  kuota pendaki Penuh 
                                                </span>
                                              @else
                                              <span class="badge badge-pill badge-primary">
                                                {{  $jadwal->kuota }} kuota pendaki
                                              </span>
                                              <span class="badge badge-pill badge-info">
                                                {{ $pendakis }} Terdaftar
                                                </span>
                                              @endif

                                            </div>

                                           {{-- {{ $pendakis }} --}}
                                        </td>
                                        <td>
                                          @if ($jadwal->kuota <= $pendakis)
                                         {{-- <a href="" type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg{{ $jadwal->id }}">Pilih</a> --}}
                                              
                                          @else
                                          @if (date('d-m-y', strtotime($jadwal->tgl_jadwal)) >=  date('d-m-y') || date('m-y', strtotime($jadwal->tgl_jadwal)) >  date('m-y'))
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg{{ $jadwal->id }}">
                                                    Booking
                                                </button> 
                                              @else
                                              <span class="badge badge-pill badge-danger">
                                                Jadwal Sudah lewat
                                                </span>
                                              @endif
                                          @endif
																				</td>
																		</tr>
                                    
                       {{-- <form action="{{ url('/booking-add-order') }}" method="post"> @csrf   --}}
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg{{ $jadwal->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Lengkapi Data Pendakian dan Ketua Kelompok</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

																																									  
																																		<div class="row">
                                    <div class="col-lg-12">
                                   <h5><span class="badge badge-info">Lengkapi Data Pendakian</span></h5>
                                   </div>
                                    <div class="col-lg-12">

                                       <div class="form-group">
                                         <label for="example-text-input" class="col-form-label">Jadwal Mulai Pendakian : </label>
                                             <label for="example-text-input" class="col-sm-2 col-form-label">{{ date('j M, Y', strtotime($jadwal->tgl_jadwal)) }}</label>
                                           <input hidden required type="text" name="id_jadwal" value="{{ $jadwal->id }}">
                                       </div>

                                       <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Pilih Tanggal Turun Pendakian</label>
                                        <div class="input-group">
                                         <input type="date" class="form-control" name="tgl_turun" required placeholder="mm/dd/yyyy" min="{{ date('yy-m-d', strtotime($jadwal->tgl_jadwal)) }}">
                                         <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                       </div><!-- input-group -->
                                      </div>

                                       <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Jalur Mulai Pendakian : </label>
                                        <label for="example-text-input" class="col-sm-5 col-form-label">{{ $jalur_pendakian->nama_jalur }}</label>
                                        <div>
                                          <input class="form-control" hidden type="text" required name="id_jalur" value="{{ $jalur_pendakian->id }}" id="example-text-input" >
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                       <label for="example-text-input" class="col-form-label">Nama Kelompok/Organisasi</label>
                                       <div>
                                         <input class="form-control" type="text" name="nama_kelompok" id="example-text-input" placeholder="Opsional" >
                                       </div>
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                     <h5><span class="badge badge-info">Isi Data Ketua Kelompok</span></h4>
                                    </div>

																																			<div class="col-lg-6">
                                     <div class="form-group">
                                       <label for="example-text-input" class="col-form-label">Nama Ketua Kelompok</label>
                                       <div>
                                             <input class="form-control" type="text" required name="nama" id="example-text-input" >
                                       </div>
                                     </div>
               
                                     <div class="form-group">
                                       <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                                       <div>
                                         <input class="form-control" required type="text" name="tgl_lahir" id="example-text-input">
                                       </div>
                                     </div>
                                      
                                   
                                        <div class="form-group">
                                         <label class="col-form-label">Jenis Kelamin</label>
                                           <select class="form-control" required name="jenis_kelamin">
                                             <option>Select</option>
                                             <option value="Pria">Pria</option>
                                             <option value="Wanita">Wanita</option>
                                           </select>
                                       </div>
                  
                                       <div class="form-group">
                                         <label for="example-text-input" class="col-form-label">Jenis Identitas</label>
                                         <div>
                                               <input class="form-control" type="text" required name="janis_identitas" id="example-text-input" >
                                         </div>
                                       </div>
              
                                       <div class="form-group">
                                         <label for="example-text-input" class="col-form-label">Nomer Identitas</label>
                                         <div>
                                           <input class="form-control" required type="text" name="no_identitas" id="example-text-input">
                                         </div>
                                       </div>
                 
                                       <div class="form-group">
                                         <label for="example-text-input" class="col-form-label">Upload Foto Identitas</label>
                                         <div>
                                           <input class="form-control" required type="file" name="image_identitas" id="example-text-input">
                                            <small class="form-text text-muted">Max: 1</small>
                                          </div>
                                       </div>
																																				</div>

																																					<div class="col-lg-6">
                                       <div class="form-group">
                                         <label for="example-text-input" class="col-form-label">Alamat</label>
                                         <div>
                                           <input class="form-control" required type="text" name="alamat" id="example-text-input">
                                         </div>
                                       </div>
                                       
                                       <div class="form-group">
                                          <label for="example-text-input" class="col-form-label">Kota Asal</label>
                                           <div>
                                             <input class="form-control" required type="text" name="kota_asal" id="example-text-input">
                                           </div>
                                        </div>
                                        <div class="form-group has-success">
                                          <label for="inputHorizontalSuccess" class="col-form-label">Email</label>
                                          <div>
                                            <input type="email" class="form-control form-control-success" name="email" required id="inputHorizontalSuccess" placeholder="name@example.com">
                                            <div class="form-control-feedback">Email Harus Aktiv untuk mengirimkan Token Booking.</div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="example-text-input" class="col-form-label">No Hp</label>
                                           <div>
                                             <input class="form-control" required type="text" name="no_hp" id="example-text-input">
                                           </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="example-text-input" class="col-form-label">No Hp Lain</label>
                                           <div>
                                             <input class="form-control" required type="text" name="no_hp_lain" id="example-text-input">
                                           </div>
                                        </div>
                                       
																																	</div>
                                </div>
                                
                                <div class="button-items">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Selesai Lanjutkan Boking</button></div>
                                 
                         

                                         {{-- <p>{{ $jadwal->tgl_jadwal }}</p> --}}
                                          </div>
                                      </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                  </div><!-- /.modal -->
                                  <script>
                                    $(document).ready(function() {
                                        $('form').parsley();
                                    });
                            </script>
                                 </form>
                                 
																		@endforeach
                  
																		@else
																		<div class="font-14">
                                      <span class="badge badge-danger">Jadwal Belum Tersedia</span>
                                  </div>
                  @endif
                 </tbody>
                </table>
                {{$jadwals->links()}}
               </div>
              </div>
             </div>
            </div> <!-- end col -->
            
            
           </div>

          


@section('app_js')
    
            
        <!-- Plugins js -->
        <script src="{{ asset('/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>   
				
				 <!-- Parsley js -->
				 <script src="{{ asset('/plugins/parsleyjs/parsley.min.js') }}"></script>
				
        <!-- Plugins Init js -->
				<script src="{{ asset('frontend/pages/form-advanced.js') }}"></script>
				<!-- Bootstrap inputmask js -->
        <script src="{{ asset('/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
				
			
				
				<script>
            jQuery.browser = {};
                (function () {
                    jQuery.browser.msie = false;
                    jQuery.browser.version = 0;
                    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                        jQuery.browser.msie = true;
                        jQuery.browser.version = RegExp.$1;
                    }
                })();
        </script>

@endsection


@endsection

