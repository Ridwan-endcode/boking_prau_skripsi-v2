@extends('layouts.adminLayout.admin_desing')

@section('app_css')
       <!-- DataTables -->
       <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
       <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

          <!-- Magnific popup -->
          <link href="{{ asset('/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">

       <!-- Responsive datatable examples -->
       <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

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
                                    <h4 class="page-title"> Validasi Booking Pendakian <br> Admin Sistem Boking Gunung Prau</h4>
                               
                                </div>

                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">dashboard</a></li>
                                        <li class="breadcrumb-item active">Validasi Booking</li>
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
                            {{-- {{ $orders->transak->nama_pengirim }} --}}
                            
                            @if ($orders->id_transaksi == null)

                                @if (empty($orders->transak->nama_pengirim))
                                <div class="col-xl-4">
                                    <div class="card m-b-30">
                                        <div class="card-header">
                                                <div class="font-16">
                                                        <span class="badge badge-warning">Pendaki Belum Melakukan Pembayaran</span>
                                                </div>
                                        </div>
                                       
                                        <div class="card-body">
                                                <h4 class="card-title font-16 mt-0">Lakukan Pembayaran Di tempat</h4>
                                                <p class="card-text">Lakukan Pembayaran di tempat adalah di input oleh
                                                    pada saat pendaki blum melakukan konfirmasi pembayaran atau bisa bayar di tempat
                                                </p>
                                                    
                                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center-add">Lakukan Transaksi di tampat</a>
                                                    
                                        </div>

                                        <div class="modal fade bs-example-modal-center-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0">Lakukan Transaksi Pembayaran</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        
                                        <form class="" method="post" action="{{ url('/administrator/view-order-validasipembayaran/') }}" enctype="multipart/form-data" > @csrf
                                        
                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">Nama Pembayar</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="text"  name="nama_pengirim" required  id="example-text-input">
                                                        <input class="form-control" type="text" name="id_order" hidden value="{{ $orders->id }}"  id="example-text-input">
                                                    </div>
                                            </div>


                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">Jumlah Pembayaran</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="number" name="jumlah" required id="example-text-input">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">Upload Foto Bukti Pembayaran</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="file" placeholder="Opsional"  name="foto_bukti" id="example-text-input">
                                                    </div>
                                            </div>

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
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                        
                                        
                                    </div>
                                </div>
                               
                                @endif
                            @else
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        Telah Melakukan Pembayaran pada : {{ date('j M, Y h:i:sa', strtotime($orders->transak->created_at)) }}
                                    </div>
                            <div class="card-body">
                                                    
                                <h4 class="card-title font-16 mt-0">Lakukan Konfirmasi Pembayaran</h4>
                                <p class="card-text">Pendaki ini telah melakukan pembayaran secara Transfer dan melakukan konfirmasi 
                                    pembayaran melalui online
                                </p>
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">Lihat Transaksi</button>    
                            </div>
                            <div class="card-footer text-muted">
                                @if (empty($orders->status_bayar))
                                    
                                <div class="font-16">
                                        <span class="badge badge-warning">Blum Di lakukan Verivikasi</span>
                                </div>
                                @else
                                <div class="font-16">
                                        <span class="badge badge-success">Pembayaran Telah Di validasi Oleh = {{ $orders->users->name }}</span>
                                </div>
                                <a href="{{ url('') }}" type="button" class="btn btn-primary waves-effect waves-light btn-sm">
                                   Kirim Konfirmasi Pendakian Melalui WA
                                </a>
                                @endif
                            </div>
                                </div>
                        
                           
                        </div>
                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Lakukan Konfirmasi Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <dl class="row mb-0">
                                                    <dt class="col-sm-12">Biaya Pendakian : <span class="badge badge-success font-16">@currency($orders->harga )</span></dt>
                                                <dt class="col-sm-5">Nama Pengirim</dt>
                                                <dd class="col-sm-5">: {{ $orders->transak->nama_pengirim }}</dd>

                                                <dt class="col-sm-5">NO rek</dt>
                                                <dd class="col-sm-5">: {{ $orders->transak->no_rek }}</dd>

                                                <dt class="col-sm-5">Melalui Bank</dt>
                                                <dd class="col-sm-5">: {{ $orders->transak->bank }}</dd>

                                                <dt class="col-sm-5">Jumlah Transfer</dt>
                                                <dd class="col-sm-5">: @currency($orders->transak->jumlah)</dd>

                                                <dt class="col-sm-5">Bukti Transfer</dt>
                                                <dd class="col-sm-5">: 
                                                    <a class="image-popup-no-margins" href="{{ asset('image/buktitransaksi/'.$orders->transak->foto_bukti) }}">
                                                    <img class="img-fluid d-block" src="{{ asset('image/buktitransaksi/'.$orders->transak->foto_bukti) }}" alt="" width="100">
                                                </a>
                                                </dd>
                                            <dl>
                                                @if ($orders->status_bayar == null)
                                                    
                                                <a href="{{ url('/administrator/view-order-validasipembayaran/'.$orders->token_pendakian) }}" type="button" class="btn btn-primary waves-effect waves-light">
                                                    Validasi Pembayaran
                                                </a>
                                                @else
                                                <a href="{{ url('/administrator/view-order-batalpembayaran/'.$orders->token_pendakian) }}" type="button" class="btn btn-danger waves-effect waves-light">
                                                   Batalkan Transaksi
                                                </a>
                                                @endif

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        
                           @endif
                        


                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <h5 class="card-header mt-0">Absensi Pendaki</h5>
                                    <div class="card-body">
                                        <h4 class="card-title font-16 mt-0">Pendaki Mulai Naik</h4>
                                        <p class="card-text">
                                            Jadwal Pendakian : {{ date('j M, Y', strtotime($orders->jadwals->tgl_jadwal)) }} -- Tidak bisa di Absen jika tanggal absen 
                                            tidak sesuai dengan tanggal pendakian
                                        </p>
                                    <a href="{{ url('/administrator/view-order-absendatang/'.$orders->token_pendakian) }}" class="btn btn-primary">Absen Pendaki Naik</a>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-header">
                                        Tiket Pendakian
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <p>
                                                Download Tiket Pendakian
                                            </p>
                                            <div class="row icon-demo-content text-center">
                                            <div class="col-sm-6 col-md-4 col-lg-3">
                                                 <a href=""> <i class="icon-cloud-download"></i> Download Formulir</a>  
                                            </div>
                                            </div>
                                            <footer class="blockquote-footer font-12">
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
        
                        </div>

                        <!-- end row -->
    
                       
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title mb-4">Data Diri Ketua Pendakian</h4>
                                    {{-- <table class="table table-striped mb-0"> --}}
                                    <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                              <th>Nama</th>
                                              <th>Tgl lahir</th>
                                              <th>Jenis kelamin</th>
                                              <th>Jenis identitas</th>
                                              <th>No identitas</th>
                                              <th>Email</th>
                                              <th>Kota Asal</th>
                                              <th>No HP</th>
                                              <th>No hp lain</th>
                                              <th>Alamat</th>
                                            </tr>
                                            </thead>
            
            
                                            <tbody>
                                                    <tr>
                                                    <td>{{ $orders->pendakis->nama }}</td>
                                                    <td>{{ $orders->pendakis->tgl_lahir }}</td>
                                                    <td>{{ $orders->pendakis->jenis_kelamin }}</td>
                                                    <td>{{ $orders->pendakis->janis_identitas }}</td>
                                                    <td>{{ $orders->pendakis->no_identitas }}</td>
                                                    <td>{{ $orders->pendakis->email }}</td>
                                                    <td>{{ $orders->pendakis->kota_asal }}</td>
                                                    <td>{{ $orders->pendakis->no_hp }}</td>
                                                    <td>{{ $orders->pendakis->no_hp_lain }}</td>
                                                    <td>{{ $orders->pendakis->alamat }}</td>
                                                
                                                    </tr>
                                                  
                                                      </tbody>
                                                  </table>

                                    <h4 class="mt-0 header-title mb-4">Data Diri Aggota Pendakian</h4>

                                    <table id="datatableanggota" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                              <th>Nama</th>
                                              <th>Tgl lahir</th>
                                              <th>Jenis kelamin</th>
                                              <th>Jenis identitas</th>
                                              <th>No identitas</th>
                                              <th>Email</th>
                                              <th>Kota Asal</th>
                                              <th>No HP</th>
                                              <th>No hp lain</th>
                                              <th>Alamat</th>
                                            </tr>
                                            </thead>
            
            
                                            <tbody>
                                                    @if(count($pendakis) > 0)
                                                    @foreach ($pendakis as $pendaki)
                                                    <tr>
                                                    <td>{{ $pendaki->nama }}</td>
                                                    <td>{{ $pendaki->tgl_lahir }}</td>
                                                    <td>{{ $pendaki->jenis_kelamin }}</td>
                                                    <td>{{ $pendaki->janis_identitas }}</td>
                                                    <td>{{ $pendaki->no_identitas }}</td>
                                                    <td>{{ $pendaki->email }}</td>
                                                    <td>{{ $pendaki->kota_asal }}</td>
                                                    <td>{{ $pendaki->no_hp }}</td>
                                                    <td>{{ $pendaki->no_hp_lain }}</td>
                                                    <td>{{ $pendaki->alamat }}</td>
                                                
                                                    </tr>
                                                    @endforeach
                                                  
                                                      </tbody>
                                                    </table>
                                                    @else
                                                    <div class="font-14">
                                                        <span class="badge badge-danger">Tidak Memiliki Anggota</span>
                                                    </div>
                                                    @endif
                                  

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-5">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Data Pendakian</h4>

                                    <dt class="col-sm-12">Tanggal Pendakian : {{ date('j M, Y', strtotime($orders->jadwals->tgl_jadwal)) }}</dt>
                                    <dt class="col-sm-12">Tanggal Turun Pendakian : {{ date('j M, Y', strtotime($orders->tgl_turun)) }}</dt>
                                    <dt class="col-sm-12">Jalur Pendakian : {{ $orders->jalur_pendakis->nama_jalur }}</dt>
                                    <dt class="col-sm-12">Jumlah Pendaki : {{ $pendakijumlah->count() }} Orang</dt>
                                    <dt class="col-sm-12">Biaya Pendakian : <span class="badge badge-success font-16">@currency($orders->harga )</span></dt>
                                                   
                                        
                                    
                                  
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
    
                         
    
                       
    
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
 <!-- Required datatable js -->
 <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Buttons examples -->
 <script src="{{ asset('/plugins/datatables/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/jszip.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/pdfmake.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/vfs_fonts.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/buttons.print.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/buttons.colVis.min.j') }}s"></script>
 <!-- Responsive examples -->
 <script src="{{ asset('/plugins/datatables/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>


 <!-- Magnific popup -->
 <script src="{{ asset('/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
 <script src="{{ asset('backend/pages/lightbox.js') }}"></script>

 <!-- Datatable init js -->
 <script src="{{ asset('backend/pages/datatables.init.js') }}"></script>   
@endsection