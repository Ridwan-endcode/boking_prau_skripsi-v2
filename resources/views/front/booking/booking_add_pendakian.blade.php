@extends('layouts.frontLayout.front_desain')

@section('content')
    

        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Pilih Jalur Pendakian</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- end row -->
        </div>
        <div class="card-body">
                <div class="">
                     @if (Session::has('flash_message_success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{!! session('flash_message_success') !!}</strong> 
                    </div>
                    @endif
                    @if (Session::has('flash_message_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                    @endif
                </div>
            </div>

        
        <div class="row">

            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Lanjut Boking Pendakian</h4>
                        <p class="sub-title">Use one of two modifier classes to make
                            <code>&lt;thead&gt;</code>s appear light or dark gray.
                        </p>
                        
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-default">
                                    <tr>
                                        <th>id_oder</th>
                                        <th>Tanggal Pendakian</th>
                                        <th>Jalur Pendakian</th>
                                        <th>Status</th>
                                        <th>Acction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($userCart as $cart)
                                    <tr>
                                        <th scope="row">{{ $cart->id }}</th>
                                        <td>{{ $cart->id_jadwal }}</td>
                                        <td>{{ $cart->id_jalur }}</td>
                                        <td>Status</td>
                                        <td>
                                                <div class="button-items">
                                                    <a href="{{ url('/booking-add-order/data-diri-pendaki/'.$cart->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-light">Lanjutkan Isi Data Diri </a>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            

           
         
        </div>





@endsection

