@extends('layouts.adminLayout.admin_desing')

@section('app_css')
       <!-- DataTables -->
       <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
       <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

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
                                    <h4 class="page-title"> Order Pendakian <br> Admin Sistem Boking Gunung Prau</h4>
                               
                                </div>

                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">dashboard</a></li>
                                        <li class="breadcrumb-item active">Order Pendakian</li>
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
    
                                <div class="col-12">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                
                                                
                
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>Token Pendakian</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Jadwal Pendakian</th>
                                                        <th>Jalur Pendakian</th>
                                                        <th>Transaksi</th>
                                                        <th>Nama Ketua</th>
                                                        <th>Nama Kelompok</th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                    </thead>
                
                
                                                    <tbody>
                                                @if(count($orders) > 0)
                                                  @foreach($orders as $order)
                                                  <tr>
                                                      <td>{{ $order->token_pendakian }}</td>
                                                      <td> {{ date('j M, Y', strtotime($order->created_at)) }}</td>
                                                      <td>{{ date('j M, Y', strtotime($order->jadwals->tgl_jadwal)) }}</td>
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
                                                    <td>
                                                        <a href="{{ url('/administrator/view-order-lihatpendaki/'.$order->token_pendakian) }}" type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">Lihat Pendaki</a>

                                                    </td>
                                                  
                                                  </tr>
                                                  @endforeach
                                                  @else
                                                  <p>Tidak ada data</p>
                                              @endif
                                                    
                                                   
                                                    </tbody>
                                                </table>
                
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

 <!-- Datatable init js -->
 <script src="{{ asset('backend/pages/datatables.init.js') }}"></script>   
@endsection