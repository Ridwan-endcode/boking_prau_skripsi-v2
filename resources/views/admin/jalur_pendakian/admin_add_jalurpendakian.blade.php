

@extends('layouts.adminLayout.admin_desing')

@section('app_css')
<link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 
@endsection

@section('content')

   


<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah data Jalur Pendakian </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/administrator/view-jalurpendakian') }}">Jalur Pendakian</a></li>
              <li class="breadcrumb-item active">Tambah Data Jalur Pendakian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
  @if (Session::has('flash_message_success'))
  <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Success</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                {!! session('flash_message_success') !!}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

  @endif
  @if (Session::has('flash_message_error'))
  <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Ada Kesalahan</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                {!! session('flash_message_error') !!}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
  @endif


  
  <section class="content">
      <div class="container-fluid">
        <div class="row">
  
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data Jalur Pendakian</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                <form role="form" id="quickForm"  method="post" action="{{ url('/administrator/add-jalurpendakian') }}" enctype="multipart/form-data" > @csrf 
                    <div class="card-body">
                        
                            <div class="form-group">
                                    <label for="nama_jalur">Nama Jalur Pendakian</label>
                                    <input type="text" class="form-control" id="nama_jalur" name="nama_jalur" >
                            </div>
                        
                          <div class="form-group">
                            {{-- <input type="checkbox" class="form-check-input" name="status"> --}}
                            <input type="checkbox" name="status" id="status" value="1"  >
                            <label for="exampleCheck1">Status Buka Tutup Jalur Pendakian</label>
                          </div>

                          <div class="form-group">
                              <label for="alamat_jalur">Alamat Jalur Pendakian</label>
                              <input type="text" class="form-control" id="alamat_jalur" name="alamat_jalur" >
                          </div>
                          
                          <div class="form-group">
                              <label for="exampleInputFile">File Jalur Pendakian</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input"  name="image_peta_jalur"  id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Masukan Foto Jalur Pendakian</label> 
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="">Upload</span>
                                </div>
                              </div>
                            </div>

                     
                      
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
    
             
    
    
              </div>
              <!--/.col (left) -->
  
        </div>
      </div>
    </section>



</div>


@section('app_js')
<!-- jquery-validation -->
{{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
<script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Page script -->
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4',
        required: true
      })
  
      $( function() {
        $( "#datepicker" ).datepicker();
      });

      
    })
  </script>


<script type="text/javascript">
  $(document).ready(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        return true;
      }
    });
    $('#quickForm').validate({
      rules: {
        nama_jalur: {
          required: true,
        },
        alamat_jalur: {
          required: true,
        },
        image_peta_jalur: {
          required: true,
        },
       
      
      },
      messages: {
        nama_jalur: {
          required: "Tolong Isi Nama Jalur Pendakian"
        },
        alamat_jalur: {
          required: "Alamat Pendakian Ini Harus di isi"
        },
        image_peta_jalur: {
          required: "Foto Jalur Pendakian Harus di Isi"
        },
       
        
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>

@endsection

@endsection