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
                                    <h4 class="page-title">Lihat Semua Keuangan Masuk <br> Sistem Boking Gunung Prau</h4>
                              
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">

                                           
                                        <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">dashboard</a></li>
                                        <li class="breadcrumb-item active">Lihat Keuangan</li>
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
                                                <th>Id order</th>
                                                <th>Token Pendakian</th>
                                                <th>Jumlah Pembayaran</th>
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php $total_amount = 0 ;?>
                                            @if(count($orders) > 0)
                                              @foreach($orders as $order) 
                                                <tr>
                                                    <td>
                                                      {{ $order->id }}
                                                    </td>
                                                    <td>
                                                        {{ $order->token_pendakian }}
                                                    </td>
                                                    <td>
                                                        {{ $order->harga }}
                                                    </td>
                                                </tr>
                                                <?php $total_amount = $total_amount + ($order->harga++); ?>
                                                @endforeach
                                            @endif
                                           
                                            </tbody>
                                        </table>

                                        
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="card m-b-30 text-white bg-info">
                                <div class="card-body">
                                    <blockquote class="card-bodyquote mb-0">
                                        <h6>
                                          Total Uang Masuk =  <?php echo $total_amount ; ?>
                                        </h6>
                                    </blockquote>
                                </div>
                            </div>

                
    
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