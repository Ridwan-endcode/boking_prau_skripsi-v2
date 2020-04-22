

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
            <h1>Form Edit data Jadwal {{ date('j M, Y', strtotime($jadwal->tgl_jadwal)) }} </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/administrator/view-jadwal') }}">Lihat Semua Jadwal</a></li>
              <li class="breadcrumb-item active">Edit Data Jadwal</li>
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
                    <h3 class="card-title">Tambah Data Jadwal</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                <form role="form" id="quickForm" method="post" action="{{ url('/administrator/edit-jadwal/'.$jadwal->id) }}" enctype="multipart/form-data"  > @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_jalur">Pilih Jalur Pendakian</label>
                            <select class="form-control select2bs4" name="id_jalur" id="id_jalur" required style="width: 100%;">
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
                          <div class="form-group">
                            {{-- <input type="checkbox" class="form-check-input" name="status"> --}}
                            <input type="checkbox" name="status" id="status"
                            @if ($jadwal->status == "1")
                            checked
                            @endif
                            value="1"
                            >
                            <label for="exampleCheck1">Status Buka Tutup Jalur Pendakian</label>
                          </div>
                          
                        <div class="form-group">
                          <label for="tgl_jadwal">Pilih Tanggal</label>
                          <input type="text" class="form-control" id="datepicker"  value="{{ $jadwal->tgl_jadwal }}" name="tgl_jadwal" id="tgl_jadwal" autocomplete="off">
                        </div>

                        <div class="form-group">
                          <label for="kuota">Kuota Pendakian</label>
                          <input type="text"  value="{{ $jadwal->kuota }}" class="form-control" id="kuota" name="kuota" >
                        </div>

                        <div class="form-group">
                          <label for="harga">Harga Tiket</label>
                          <input type="text" class="form-control"  value="{{ $jadwal->harga }}" id="harga" name="harga" >
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

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd',
        });
  } );
  </script>
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
        id_jalur: {
          required: true,
        },
        tgl_jadwal: {
          required: true,
        },
        kuota: {
          required: true,
          number: true
        },
        harga : {
          required: true,
          number: true
        },
      
      },
      messages: {
        id_jalur: {
          required: "Tolong Isi Jalur Pendakian"
        },
        tgl_jadwal: {
          required: "Jadwal Ini Harus di isi"
        },
        kuota: {
          required: "Kouta Harus di Isi",
          number: "harus Berformati Nomer"
        },
        harga: {
          required: "Kouta Harus di Isi",
          number: "harus Berformati Nomer"
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