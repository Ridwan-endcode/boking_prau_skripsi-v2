

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
                  <h1 class="m-0 text-dark">Lihat semua Booking Pendakian</h1>
                 </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Semua Booking Pendakian</li>
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
                        <h3 class="card-title">Tabel Semua Order Pendakian</h3>
        
                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 300px;">
                            <input type="text" required name="table_search" class="form-control float-right" placeholder="Cari Berdasarkan Token">
        
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                                <th>Tindakan</th>
                                <th>Token Pendakian</th>
                                <th>Tanggal Order</th>
                                <th>Jadwal Pendakian</th>
                                <th>Jalur Pendakian</th>
                                <th>Transaksi</th>
                                <th>Nama Ketua</th>
                                <th>Nama Kelompok</th>
                            </tr>
                          </thead>
                          <tbody>
                              @if(count($orders) > 0)
                              @foreach($orders as $order)
                            <tr>
                                <td>
                                    <a class="btn btn-success btn-sm"  href="{{ url('/administrator/view-order-lihatpendaki/'.$order->token_pendakian) }}"data-toggle="tooltip" data-placement="bottom" title="Lihat Data Pendaki"><i class="fas fa-eye"></i> </a>

                                </td>
                                     <td>{{ $order->token_pendakian }}</td>
                                                      <td> {{ date('j M, Y', strtotime($order->created_at)) }}</td>
                                                        @if (empty($order->jadwals->tgl_jadwal))
                                                            <td>Data Tidak Ada</td>
                                                        @else
                                                            
                                                        <td>{{ date('j M, Y', strtotime($order->jadwals->tgl_jadwal)) }}</td>
                                                        @endif

                                                      <td>{{ $order->jalur_pendakis->nama_jalur }}</td>
                                                      <td>
                                                    @if ($order->id_transaksi == null)
                                                        @if (empty($order->transak->nama_pengirim))
                                                        <dt>
                                                                <span class="badge badge-pill badge-danger">
                                                                    Belum Melakukan Pembayaran 
                                                                  </span>
                                                        </dt>
                                                        @endif

                                                    @else
                                                    <dt>
                                                            <span class="badge badge-pill badge-info">
                                                                Telah Melakukan Pembayaran 
                                                              </span>
                                                    </dt>   
                                                    <dt>
                                                            @if (empty($order->transak->id ))
                                                            <span class="badge badge-pill badge-info">
                                                                    Transaksi id Tidak ada
                                                           </span>
                                                            @else                                         
                                                            
                                                              <span class="badge badge-pill badge-info">
                                                                     Id Pembayaran :
                                                                      {{ $order->transak->id }}
                                                            </span>
                                                            @endif
                                                    </dt>       
                                                    <dt>
                                                            @if (empty($order->users->name ))
                                                            <span class="badge badge-pill badge-info">
                                                                    Validasi Data tidak ada
                                                           </span>
                                                            @else                                         
                                                            {{-- {{ $order->pendakis->nama }} --}}
                                                            <span class="badge badge-pill badge-info">
                                                               Di validasi Oleh :
                                                                {{ $order->users->name }}
                                                              </span>
                                                            @endif
                                                    </dt>       
                                                    @endif
                                                      <td>
                                                            @if (empty($order->pendakis->nama))
                                                            Data Tidak Ada
                                                            @else                                         
                                                            {{ $order->pendakis->nama }}
                                                            @endif
                                                        </td>
                                                      <td>{{ $order->nama_kelompok }}</td>
                                                   
                                                  
                            </tr>
                            @endforeach
                            @else
                            <p>Tidak ada data</p>
                        @endif
                          </tbody>
                        </table>
                        {{$orders->links()}} 
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
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