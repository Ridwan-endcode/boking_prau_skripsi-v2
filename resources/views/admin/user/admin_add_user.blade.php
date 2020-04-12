

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
                                    <h4 class="page-title">Tambah Admin Sistem Boking Gunung Prau</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ url('administrator/view-admin') }}">Data Admin</a></li>
                                        <li class="breadcrumb-item active">Tambah Admin</li>
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
                
                                            
                                                <form class="" method="post" action="{{ url('/administrator/add-user') }}" enctype="multipart/form-data" > @csrf
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="form-control" required placeholder="Type something"/>
                                                    </div>

                                                    <div class="form-group">
                                                            <label>E-Mail</label>
                                                            <div>
                                                                <input type="email" class="form-control" required
                                                                       parsley-type="email" name="email" placeholder="Enter a valid e-mail"/>
                                                            </div>
                                                        </div>
                
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <div>
                                                            <input type="password" id="pass2" class="form-control" required
                                                                   placeholder="Password" name="password" />
                                                        </div>
                                                        <div class="m-t-10">
                                                            <input type="password" class="form-control" required
                                                                   data-parsley-equalto="#pass2"
                                                                   placeholder="Masukan Kembali Password"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                            <label>Foto Petugas</label>
                                                            <div>
                                                                <input type="file" class="form-control" required
                                                                       parsley-type="image" name="image" placeholder="Foto Petugas"/>
                                                            </div>
                                                        </div>
 
                                                    <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label" >Status</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" name="status" required>
                                                                    <option value="0">Select</option>
                                                                    <option value="1">Aktiv</option>
                                                                    <option value="0">Tidak Aktiv</option>
                                                                </select>
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
@endsection