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
                                    <h4 class="page-title"> Jalur Pendakian <br> Admin Sistem Boking Gunung Prau</h4>
                                    <div class="button-items">
                                        <a href="{{ url('/administrator/add-jalurpendakian') }}" type="button" class="btn btn-primary waves-effect waves-light">  <i class="icon-profile-add"></i>    Tambah Data Jalur Pendakian </a>
                                        </div>
                                </div>

                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">dashboard</a></li>
                                        <li class="breadcrumb-item active">Jalur Pendakian</li>
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
                                                        <th>Nama Jalur</th>
                                                        <th>Alamat Jalur</th>
                                                        <th>Status</th>
                                                        <th>
                                                        Image Peta
                                                        </th>
                                                        <th>di Buat Oleh</th>
                                                        <th>Tindakan</th>
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
                                                          <img width="70" src="{{ asset("backend/images/image_peta_jalur/$jalur_pendakian->image_peta_jalur") }}" alt="user" class="rounded-circle">
                                                      </td>
                                                      <td>
                                                          @if (empty($jalur_pendakian->user->name))
                                                          Data Tidak Ada  
                                                          @else                                           
                                                          {{ $jalur_pendakian->user->name }}   
                                                          @endif
                                                        </td>
                                                      <td>
                                                          <div class="button-items">
                                                          <a href="{{ url('/administrator/edit-jalurpendakian/'.$jalur_pendakian->id) }}" type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">edit</a>
                                                          <a href="{{ url('/administrator/hapus-jalurpendakian/'.$jalur_pendakian->id) }}" type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm">Hapus</a>
                                                          <a href="{{ url('/administrator/view-jadwal-jalurpendakian/'.$jalur_pendakian->id) }}" type="button" class="btn btn-outline-success waves-effect waves-light btn-sm">Lihat Jadwal</a>
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