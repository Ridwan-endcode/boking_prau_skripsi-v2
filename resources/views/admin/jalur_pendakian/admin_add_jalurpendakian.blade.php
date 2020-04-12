

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
                                    <h4 class="page-title">Tambah Jalur pendakian <br> Sistem Boking Gunung Prau</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/view-jalurpendakian') }}">Lihat Jalur Pendakian</a></li>
                                        <li class="breadcrumb-item active">Tambah Jalur Pendakian</li>
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
                
                                            
                                                <form class="" method="post" action="{{ url('/administrator/add-jalurpendakian') }}" enctype="multipart/form-data" > @csrf
                                                    
                                                    <div class="form-group">
                                                            <label>Nama Jalur Pendakian</label>
                                                            <input type="text" name="nama_jalur" class="form-control" required placeholder="Type something"/>
                                                    </div>
                                                    
                                                   
                                                    <div class="form-group">
                                                        <label>Status Buka/Tutup Jalur Pendakian</label>
                                                        <div>
                                                            <select class="form-control" name="status" required>
                                                                <option value="0">Select</option>
                                                                <option value="1">Jadwal Di buka</option>
                                                                <option value="0">Jawal Di tutup </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                            <label>Alamat Jalur Pendakian</label>
                                                            <textarea class="form-control" name="alamat_jalur" id="" cols="30" rows="5"></textarea>
                                                            {{-- <input type="text" name="nama_jalur" class="form-control" required placeholder="Type something"/> --}}
                                                    </div>

                                                    <div class="form-group">
                                                            <label>Foto Peta Jalur Pendakian</label>
                                                            <div>
                                                                <input type="file" class="form-control" required
                                                                       parsley-type="image" name="image_peta_jalur" placeholder="Foto Petugas"/>
                                                            </div>
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