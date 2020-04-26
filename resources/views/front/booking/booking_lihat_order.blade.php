@extends('layouts.frontLayout.front_desain')

@section('content')
    
<div class="all-title-box">
		<div class="container text-center">
			<h1>Booking Selesai <br> Token Anda : {{ $orders->token_pendakian }} </h1>
		</div>
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

<div class="container">

        <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">

                      <div class="row">
                        <div class="col-lg-6">

                            <h4 class="mt-0 header-title">Booking Status</h4>
                            <?php echo date('Y-m-d h:i:sa', strtotime("+1 day", strtotime(date("Y-m-d h:i:sa")))); ?> 
                            <?php echo date('Y-m-d h:i:sa'); ?> 

                            <div class="col-xl-12">
                                    <div class="card m-b-30 text-white bg-info">
                                        <div class="card-body">
                                            <blockquote class="card-bodyquote mb-0">
                                                <h5>
                                                    Token Boking = {{ $orders->token_pendakian }}
                                                </h5>
                                                <footer class="blockquote-footer text-white font-12">
                                                    Harap Catat Token Booking ini Untuk Cek Status Booking Anda
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>

                            <blockquote class="blockquote font-16">
                              
                                <dl class="row mb-0">
                                    @if (date('Y-m-d h:i:s') <= $orders->kadaluarsa)
                                        @if ($orders->id_transaksi == null)
                                        <dt class="col-sm-5">Status Boking</dt>
                                        <dd class="col-sm-7">:  
                                                <span class="badge badge-warning">Pengajuan</span> 
                                                <p>
                                                    Silahkan Lakukan Konfirmasi Pembayaran Untuk merubah status
                                                </p>
                                        </dd>
                                        @elseif(!empty($orders->status_bayar))
                                        <dt class="col-sm-4">Status Boking</dt>
                                        <dd class="col-sm-8"> <span class="badge badge-success">Booking DiSetujui</span></dd>
                                        @else
                                        <dt class="col-sm-4">Status Boking</dt>
                                        <dd class="col-sm-8"> <span class="badge badge-warning">Menunggu Konfirasi Pembayaran</span></dd>
                                      
                                        @endif
                                        @elseif(!empty($orders->status_bayar))
                                        <dt class="col-sm-4">Status Boking</dt>
                                        <dd class="col-sm-8"> <span class="badge badge-success">Booking DiSetujui</span></dd>
                                    @elseif(!empty($orders->id_transaksi))
                                      <dt class="col-sm-4">Status Boking</dt>
                                      <dd class="col-sm-8"> <span class="badge badge-warning">Menunggu Konfirasi Pembayaran</span></dd>
                                      
                                       
                                    @else
                                        Booking anda di batalkan karna lebih dari wakti pembayran
                                    @endif
                                    


                          
                                    <dt class="col-sm-5">Jadwal Pendakian</dt>
                                    <dd class="col-sm-7">: {{ $orders->jadwals->tgl_jadwal }}</dd>

                                    <dt class="col-sm-5">Tanggal Turun Pendakian</dt>
                                    <dd class="col-sm-7">: {{ $orders->tgl_turun }}</dd>

                                    <dt class="col-sm-5">Jalur Naik Pendakian</dt>
                                    <dd class="col-sm-7">: {{ $orders->jalur_pendakis->nama_jalur }}</dd>

                                    <dt class="col-sm-5">Nama Kelompok Pendakian</dt>
                                    <dd class="col-sm-7">: pendakijumlah</dd>

                                    <dt class="col-sm-5">Nama Ketua Kelompok Pendakian</dt>
                                    <dd class="col-sm-7">: {{ $orders->pendakis->nama }}</dd>

                                    <dt class="col-sm-5">Jumlah Pendaki </dt>
                                    <dd class="col-sm-7">: {{ $pendakijumlah->count() }} Orang</dd>
    
                                </dl>
                               </blockquote>

                            {{-- <blockquote class="blockquote blockquote-reverse font-16 mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote> --}}

                            

                        </div>
                        <div class="col-lg-6">

                            <h4 class="mt-0 header-title">Status Pembayaran</h4>
                            
                            <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Harga Tiket Per Orang</th>
                                                <th>Total Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>@currency($orders->jadwals->harga) Jumlah Pendaki  {{ $pendakijumlah->count() }} Orang</td>
                                                <td>@currency($orders->harga ) </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    
                                        <div class="col-xl-12">
                                            <div class="card m-b-30 text-white bg-info">
                                                <div class="card-body">
                                                    <blockquote class="card-bodyquote mb-0">
                                                        <h7>
                                                            Pembayaran dapat di lakukan Melalui Transfer Ke : <br>
                                                            No rek : 123123123 <br>
                                                            Bank : BNI <br>
                                                            Atas Nama : abcdefg <br>
                                                            Validasi Di lakukan 24 jam Setelah Melakukan Transfer
                                                        </h7>
                                                        <hr>

                                                        <h7>
                                                            Bayar Di tempat hanya berlaku ketika tangal boking sama dengan tangal pendakian
                                                        </h7>
                                                    
                                                    </blockquote>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        @if ($orders->id_transaksi == null)
                                        <h4 class="mt-0 header-title">Konfirmasi Pembayaran Via Transfer</h4>

                                        <form class="" method="post" action="{{ url('/booking-add-order-selesai/'.$orders->token_pendakian) }}" enctype="multipart/form-data" > @csrf
                                        
                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">Nama Pengirim</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="text"  name="nama_pengirim" required  id="example-text-input">
                                                        <input class="form-control" type="text" name="id_order" hidden value="{{ $orders->id }}"  id="example-text-input">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">Bank Pengirim</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="text" name="bank" required id="example-text-input">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">No rek Pengirim</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="text" name="no_rek" required id="example-text-input">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">Jumlah Total Pengiriman</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="number" name="jumlah" required id="example-text-input">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label">Upload Foto Bukti Transfer</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="file"  name="foto_bukti" required id="example-text-input">
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
                           
                                        @elseif(!empty($orders->status_bayar))
                                        <div class="col-xl-12">
                                                <div class="card m-b-30 text-white bg-success">
                                                    <div class="card-body">
                                                        <blockquote class="card-bodyquote mb-0">
                                                            <h7>
                                                                Selamat Mendaki Booking Anda di Setujui
                                                            </h7>
                                                            <hr>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                        </div>
                                        @else
                                        <div class="col-xl-12">
                                                <div class="card m-b-30 text-white bg-warning">
                                                    <div class="card-body">
                                                        <blockquote class="card-bodyquote mb-0">
                                                            <h7>
                                                                Trimaksaih Anda sudah melakukan Transaksi Pembayaran Mohon menunggu  1 x 24 jam Konfirasi
                                                            </h7>
                                                            <hr>
        
                                                            <h7>
                                                                Bayar Di tempat hanya berlaku ketika tangal boking sama dengan tangal pendakian
                                                            </h7>
                                                           
                                                        </blockquote>
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                        @endif

                                </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div> <!-- end col -->
    
</div>
@endsection

