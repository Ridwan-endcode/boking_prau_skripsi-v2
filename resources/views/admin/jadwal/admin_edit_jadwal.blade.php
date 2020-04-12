

@extends('layouts.adminLayout.admin_desing')


@section('content')

   <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Edit Jadwal pendakian Tanggal {{ date('j M, Y', strtotime($jadwal->tgl_jadwal)) }}  <br> Sistem Boking Gunung Prau</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/view-jadwal') }}">Lihat Jadwal</a></li>
                                        <li class="breadcrumb-item active">Edit Jadwal </li>
                                    </ol>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end page-title -->

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
    
                        <div class="row">
    
                        
                                <div class="col-lg-12">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                
                                            
                                                <form class="" method="post" action="{{ url('/administrator/edit-jadwal/'.$jadwal->id) }}" enctype="multipart/form-data" > @csrf
                                                    
                                                    

                                                    <div class="form-group">
                                                        <label>Pilih Jalur Pendakian</label>
                                                        <div>
                                                            <select class="form-control" disabled name="id_jalur" required>
                                                                    @if (empty($jadwal->jalur_pendakian->nama_jalur))
                                                                    <option value="{{ $jadwal->id_jalur }}">Data Tidak ada</option>
                                                                    @else                                           
                                                                    <option value="{{ $jadwal->id_jalur }}">{{ $jadwal->jalur_pendakian->nama_jalur }}   </option>
                                                                    @endif
                                                                    @if(count($jalur_pendakian) > 0)
                                                                    @foreach($jalur_pendakian as $jalur_pendakians)
                                                                        <option value="{{ $jalur_pendakians->id }}">{{ $jalur_pendakians->nama_jalur }}</option>
                                                                    @endforeach
                                                                    @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Status Buka/Tutup Jalur Pendakian</label>
                                                        <div>
                                                            <select class="form-control" name="status" required>
                                                                <option value="{{ $jadwal->id_jalur }}">
                                                                        <div class="font-14">
                                                                                @if ($jadwal->status == 1)
                                                                                <span class="badge badge-primary">Jadwal Di buka</span>
                                                                                @else
                                                                                <span class="badge badge-danger">Jawal Di tutup</span>
                                                                                @endif
                                                                        </div>
                                                                </option>
                                                                <option value="1">Jadwal Di buka</option>
                                                                <option value="0">Jawal Di tutup </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Input Tanggal Jadwal Pendakian</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" disabled class="form-control"  value="{{ $jadwal->tgl_jadwal }}" placeholder="mm/dd/yyyy" id="datepicker-autoclose" required>
                                                                <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="example-number-input" class="col-sm-2 col-form-label">Kuota Pendakian</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" value="{{ $jadwal->kuota }}" type="number" name="kuota"  id="example-number-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Harga Tiket</label>
                                                        <input type="number" placeholder="" value="{{ $jadwal->harga }}" name="harga"  class="form-control">
                                                    </div>

                                                
                
                                                    {{-- <input type="hidden" name="created_at" value="{{ date('d-m-Y H:i:s') }}"> --}}
                                                    
                
                                                    <div class="form-group">
                                                        <div>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                                Submit
                                                            </button>
                                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                
    
    
    
                        </div>
    
    
                        
    
                       
    
                    </div>
                    <!-- container-fluid -->
    
                </div>
                <!-- content -->
    
    
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



@endsection
@section('app_js')
<!-- Parsley js -->
        <script src="{{ asset('/plugins/parsleyjs/parsley.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<!-- Plugins js -->
<script src="{{ asset('/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script> 
<script src="{{ asset('/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>


<!-- Plugins Init js -->
<script src="{{ asset('backend/pages/form-advanced.js') }}"></script>
@endsection