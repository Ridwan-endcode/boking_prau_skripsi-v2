<?php 
use App\Pendaki;
use App\Order;

?>


@extends('layouts.adminLayout.admin_desing')

@section('app_css')
       <!-- DataTables -->
       <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
       <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
       <!-- Sweet Alert -->
       <link href="{{ asset('/plugins/sweet-alert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">

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
                                    <h4 class="page-title">Lihat Semua Jadwal pendakian <br> Sistem Boking Gunung Prau</h4>
                                    <div class="button-items">
                                            <a href="{{ url('/administrator/add-jadwal') }}" type="button" class="btn btn-primary waves-effect waves-light">  <i class="icon-profile-add"></i>    Tambah Data Jadwal Pendakian </a>
                                            </div>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">dashboard</a></li>
                                        <li class="breadcrumb-item active">Lihat Jadwal</li>
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
                                                <td> 
                                                    @currency($jadwal->harga)
                                                </td>
                                                <td>
                                                        @if (empty($jadwal->jalur_pendakian->nama_jalur))
                                                        Data Tidak Ada atau Di Hapus
                                                        @else                                           
                                                        {{ $jadwal->jalur_pendakian->nama_jalur }}   
                                                        @endif

                                                </td>
                                                <td>
                                                        <?php $pendakis = Pendaki::where(['id_jadwal' => $jadwal->id])->where(['status' => 1])->count(); ?>

                                                        {{-- {{ $jadwal->kuota }} --}}
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
                                                  <div class="button-items">
                                                  <a href="{{ url('/administrator/edit-jadwal/'.$jadwal->id) }}" type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">edit</a>
                                                  <a href="{{ url('/administrator/view-order-jadwal/'.$jadwal->id) }}" type="button" class="btn btn-outline-success waves-effect waves-light btn-sm">Lihat Boking</a>
                                                
                                                </div>
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