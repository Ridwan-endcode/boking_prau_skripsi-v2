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
                                    <h4 class="page-title">Admin Sistem Boking Gunung Prau</h4>
                                </div>

                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">dashboard</a></li>
                                        <li class="breadcrumb-item active">Daftar Admin</li>
                                    </ol>
                                </div>
                                <div class="button-items">
                                <a href="{{ url('/administrator/add-user') }}" type="button" class="btn btn-primary waves-effect waves-light">  <i class="icon-profile-add"></i>    Tambah Data User </a>
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
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>
                                                        Image
                                                        </th>
                                                        <th>Tindakan</th>
                                                    </tr>
                                                    </thead>
                
                
                                                    <tbody>
                                                @if(count($users) > 0)
                                                  @foreach($users as $user)
                                                  <tr>
                                                      <td>{{ $user->name }}</td>
                                                      <td>{{ $user->email }}</td>
                                                      <td>
                                                          <div class="font-14">
                                                            @if ($user->status == 1)
                                                            <span class="badge badge-primary">Aktif</span>
                                                            @else
                                                            <span class="badge badge-danger">Tidak Aktiv</span>
                                                            @endif
                                                          </div>
                                                      </td>
                                                      <td>
                                                          <img width="70" src="{{ asset("backend/images/profile/$user->image") }}" alt="user" class="rounded-circle">
                                                      </td>
                                                      <td>
                                                          <div class="button-items">
                                                          <a href="{{ url('/administrator/edit-user/'.$user->id) }}" type="button" class="btn btn-outline-info waves-effect waves-light btn-sm">edit</a>
                                                          <a href="{{ url('administrator/hapus-admin/'.$user->id) }}" type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm">Hapus</a>
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