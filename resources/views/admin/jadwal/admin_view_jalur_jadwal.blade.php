<?php 
use App\Pendaki;
use App\Order;

?>


@extends('layouts.adminLayout.admin_desing')

@section('app_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.css')}}"> 
@endsection
@section('content')
<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Lihat semua Jadwal Pendakian</h1>

                  <a href="{{ url('/administrator/add-jadwal') }}" type="button" class="btn  btn-primary btn-flat"><i class="far fa-calendar-plus"></i> Tambah Jadwal</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Semua Jadwal Pendakian</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

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
                <div class="row">
                  <div class="col-12">

                      <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Data Semua Jadwal Pendakian</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example2" class="table table-striped table-bordered dt-responsive nowrap ">
                              <thead>
                              <tr>
                                <th>Tanggal Pendakian</th>
                                <th>Status</th>
                                <th>Harga Tiket</th>
                                <th>Jalur</th>
                                <th>kuota</th>
                                <th>Di buat Oleh</th>
                                <th>Tindakan</th>
                              </tr>
                              </thead>
                              <tbody>
                              @if(count($jadwals) > 0)
                                @foreach($jadwals as $jadwal)
                                    <tr>
                                      <td>
                                          <dt>
                                              {{ date('j M, Y', strtotime($jadwal->tgl_jadwal)) }}
                                          </dt> 
                                            @if (date('d-m-y', strtotime($jadwal->tgl_jadwal)) >=  date('d-m-y') || date('m-y', strtotime($jadwal->tgl_jadwal)) >  date('m-y'))

                                            @else
                                            <dt>
                                                <span class="badge badge-primary">Jadwal Sudah Lewat</span>
                                            </dt>
                                             @endif
                                      </td>
                                      <td>
                                        <div class="font-14">
                                          @if ($jadwal->status == 1)
                                          <span class="badge badge-primary">Jadwal di Buka</span>
                                          @else
                                          <span class="badge badge-danger">Jadwal Di Tutup</span>
                                          @endif
                                        </div>
                                      </td>
                                      <td>@currency($jadwal->harga)</td>
                                      <td>
                                          @if (empty($jadwal->jalur_pendakian->nama_jalur))
                                          <span class="badge badge-danger"> Data Tidak Ada atau Di Hapus</span>
                                          @else                                           
                                          {{ $jadwal->jalur_pendakian->nama_jalur }}   
                                          @endif
                                      </td>
                                      <td> 
                                          <?php $pendakis = Pendaki::where(['id_jadwal' => $jadwal->id])->where(['status' => 1])->count(); ?>
                                          @if ($jadwal->kuota < $pendakis )
                                          <dt>
                                              <span class="badge badge-pill badge-danger">
                                                  kuota pendaki Penuh 
                                                </span>
                                          </dt>
                                          @else
                                          <dt>
                                              <span class="badge badge-pill badge-primary">
                                                {{  $jadwal->kuota }} kuota pendaki
                                              </span>
                                          </dt>
                                          <dt>

                                              <span class="badge badge-pill badge-info">
                                                {{ $pendakis }} Terdaftar
                                                </span>
                                              </dt>
                                          @endif
                                      </td>
                                      <td>
                                          @if (empty($jadwal->user->name))
                                                        Data Tidak Ada  
                                                        @else                                           
                                                        {{ $jadwal->user->name }}   
                                                        @endif
                                      </td>
                                      <td>
                                          <a href="{{ url('/administrator/edit-jadwal/'.$jadwal->id) }}" type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">edit</a>
                                          <a href="{{ url('/administrator/view-order-jadwal/'.$jadwal->id) }}" type="button" class="btn btn-outline-success waves-effect waves-light btn-sm">Lihat Boking</a>
                                        
                                      </td>
                                     
                                    </tr>
                                    @endforeach
                                    @else
                                    <p>Tidak ada data</p>
                                @endif
                                
                                {{-- <a class="btn btn-danger btn-sm delCat" rel="12" rel1="delete-product" href="javascript:">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>

                              <a class="btn btn-danger btn-sm delCat" rel="13" rel1="delete-product" href="javascript:">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                                                           --}}
                                  </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>

                  </div>
                <!-- /.col -->
              </div>
            <!-- /.row -->
          </section>


</div>


@endsection
@section('app_js')


<!-- DataTables -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.js') }}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>

  

  $('.delCat').on('click', function (e) {
        //  if (confirm('Apakah Kamu Yakin Ingin Menghapus')) {
        //      return true;
        //  }
        //  return false;

        e.preventDefault();

        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');

        Swal.fire({
        title: 'Yakinkah Kamu ingin Menghapus?',
        text: "Data Ini akan Permanen Di hapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.value) {
          window.location.href = "/administrator/" + deleteFunction + "/" + id;
        }
      })
      
     });
</script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        
        dom: 'Bfrtip',
                    order: [[ 0, 'desc' ]],
                    lengthMenu: [
                        [ 10, 25, 100, 1000 ],
                        [ '10 Baris', '25 Baris', '100 Baris', '1000 baris' ]
                    ],
                    buttons: [
                        'excel',
                        'pdf',
                        // {extend: 'print', messageTop: 'This print was produced using the Print button for DataTables'},
                        'pageLength'
                    ],
       
                    language: {
                        "sProcessing":   "Sedang Proses",
                        "sLengthMenu":   "Tampilan _MENU_ Entri",
                        "sZeroRecords":  "Tidak Ditemukan Data Yang Sesuai",
                        "sInfo":         "Tampilan _START_ Sampai _END_ Dari _TOTAL_ Entri",
                        "sInfoEmpty":    "Tampilan 0 Hingga 0 Dari 0 Entri",
                        "sInfoFiltered": "(Disaring Dari _MAX_ Entri Keseluruhan)",
                        "sInfoPostFix":  "",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "Awal",
                            "sPrevious": "Balik",
                            "sNext":     "Lanjut",
                            "sLast":     "Akhir"
                        }
                    }
      });
    });
  </script>
@endsection