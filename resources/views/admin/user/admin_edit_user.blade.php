

@extends('layouts.adminLayout.admin_desing')


@section('content')

<div class="content-wrapper">

  
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit data Admin Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Admin</li>
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
                  <h3 class="card-title">Edit Admin {{ $userDetails->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form"  method="post" action="{{ url('/administrator/edit-user/'.$userDetails->id) }}" enctype="multipart/form-data" > @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control" name="name" value="{{ $userDetails->name }}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $userDetails->email }}" name="email" placeholder="Enter email">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File Foto</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input"  name="image"  id="exampleInputFile">
                          <input type="hidden" name="current_image" value="{{ $userDetails->image }}"></input>
                          <label class="custom-file-label" for="exampleInputFile">Masukan Foto Baru anda</label> 
                          
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                          @if (!empty($userDetails->image))
                          <img style="width:30px" src="{{ asset("backend/images/profile/".$userDetails->image) }}">                 
                          || <a href="{{ url('administrator/hapus-foto-admin/'.$userDetails->id) }}" class="btn btn-danger btn-sm">Hapus Foto</a>
                           @endif
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      {{-- <input type="checkbox" class="form-check-input" name="status"> --}}
                      <input type="checkbox" name="status" id="status"
                        @if ($userDetails->status == "1")
                        checked
                        @endif
                        value="1"
                        >
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

@endsection
@section('app_js')

@endsection