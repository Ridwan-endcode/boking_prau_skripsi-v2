

@extends('layouts.adminLayout.admin_desing')


@section('content')

   


<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah data Admin </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data admin</li>
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
                    <h3 class="card-title">Tambah Data Admin</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                <form role="form" id="quickForm" method="post" action="{{ url('/administrator/add-user') }}" enctype="multipart/form-data"  > @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Nama">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password"  name="password" placeholder="Isi Password">
                        </div>
                        <div class="form-group">
                          <label for="password_confirm">Comfrim Password</label>
                          <input type="password" class="form-control" id="password_confirm" name="password_confirm"   placeholder="Isi kembali Password">
                        </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File Foto</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="image"  id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Masukan Foto Baru anda</label> 
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-check">
                        {{-- <input type="checkbox" class="form-check-input" name="status"> --}}
                        <input type="checkbox" name="status" id="status" value="1"  >
                        <label class="form-check-label" for="exampleCheck1">Status Aktiv User</label>
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
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- AdminLTE App -->

<script type="text/javascript">
  $(document).ready(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        return true;
      }
    });
    $('#quickForm').validate({
      rules: {
        name: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6
        },
        password_confirm : {
          required: true,
          equalTo: "#password"
        },
      
      },
      messages: {
        name: {
          required: "Tolong Isi nama Anda",
          email: "Please enter a vaild email address"
        },
        email: {
          required: "Tolong Isi Alamat email",
          email: "Please enter a vaild email address"
        },
        password: {
          required: "Tolong Isi  password",
          minlength: "Password Harus 6 karakter"
        },
        password_confirm: {
          required: "Tolong Isi  password",
          equalTo: "Password Anda harus Cocok dengan Sebelumnya"
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