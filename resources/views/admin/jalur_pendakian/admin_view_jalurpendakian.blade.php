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
            <h1 class="m-0 text-dark">Data Jalur Pendakian</h1>

            <a href="{{ url('/administrator/add-jalurpendakian') }}" type="button" class="btn  btn-primary btn-flat"><i class="fas fa-user-plus"></i> Tambah Data Jalur</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Jalur Pendakian</li>
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
                <h3 class="card-title">Data Jalur Pendakian Gunung Prau</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-striped table-bordered dt-responsive nowrap ">
                  <thead>
                  <tr>
                    <th>Nama Jalur</th>
                    <th>Alamat Jalur</th>
                    <th>Status</th>
                    <th>
                      Image Peta
                    </th>
                    <th>Tindakan</th>
                    <th>di Buat Oleh</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if(count($jalur_pendakians) > 0)
                      @foreach($jalur_pendakians as $jalur_pendakian)
                        <tr>
                          
                            <td>{{ $jalur_pendakian->nama_jalur }}</td>
                            <td>{{ $jalur_pendakian->alamat_jalur }}</td>
                          <td>
                              <div class="font-14">
                                  @if ($jalur_pendakian->status == 1)
                                  <span class="badge badge-primary">Aktif</span>
                                  @else
                                  <span class="badge badge-danger">Tidak Aktiv</span>
                                  @endif
                                </div>
                          </td>
                          <td> 
                              <div class="image">
                                  <img width="70" src="{{ asset("backend/images/image_peta_jalur/$jalur_pendakian->image_peta_jalur") }}" class="img-circle elevation-2" alt="User Image">
                                </div>
                          </td>
                          <td class="project-actions">
                              <a class="btn btn-info btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="{{ url('/administrator/edit-jalurpendakian/'.$jalur_pendakian->id) }}">
                                  <i class="fas fa-pencil-alt"></i>
                              </a>
                              <a class="btn btn-danger btn-xs delCat" rel="{{$jalur_pendakian->id}}" rel1="hapus-jalurpendakian" href="javascript:" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" >
                                  <i class="fas fa-trash"></i>
                              </a>
                              <a class="btn btn-success btn-xs" href="{{ url('/administrator/view-jadwal-jalurpendakian/'.$jalur_pendakian->id) }}" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Jadwal">
                                <i class="fas fa-eye"></i>
                            </a>
                          </td>
                          <td>
                              @if (empty($jalur_pendakian->user->name))
                                 Data Tidak Ada  
                              @else                                           
                                {{ $jalur_pendakian->user->name }}   
                              @endif
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
@endsection