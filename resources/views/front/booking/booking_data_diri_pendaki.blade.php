<?php 
use App\Pendaki;
?>
@extends('layouts.frontLayout.front_desain')

@section('app_css')
<link href="{{ asset('/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
<!-- DataTables -->
<link href="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    

        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Melengkapi Data Anggota Pendaki</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pilih Jadwal</a></li>
                        <li class="breadcrumb-item active">Isi data Anggota </li>
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

                              <div class="row">
                                <div class="col-lg-6">

                                    <h4 class="mt-0 header-title">Data Pendakian Kelompok</h4>
                                
        
                                    <blockquote class="blockquote font-16">
                                      
                                        <dl class="row mb-0">
                                            <dt class="col-sm-5">Jadwal Pendakian</dt>
                                            <dd class="col-sm-7">: {{ date('j M, Y', strtotime($orders->jadwals->tgl_jadwal)) }}</dd>

                                            <dt class="col-sm-5">Tanggal Turun Pendakian</dt>
                                            <dd class="col-sm-7">: {{ date('j M, Y', strtotime($orders->tgl_turun)) }} </dd>

                                            <dt class="col-sm-5">Jalur Naik Pendakian</dt>
                                            <dd class="col-sm-7">: {{ $orders->jalur_pendakis->nama_jalur }}</dd>

                                            <dt class="col-sm-5">Nama Kelompok Pendakian</dt>
                                            <dd class="col-sm-7">: {{ $orders->nama_kelompok }}</dd>
            
                                        </dl>
                                       </blockquote>
        
                                    {{-- <blockquote class="blockquote blockquote-reverse font-16 mb-0">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                    </blockquote> --}}
        
                                   

                                </div>
                                <div class="col-lg-6">

                                    <h4 class="mt-0 header-title">Data Ketua Kelompok Pendakian</h4>
                                    
        
                                    <blockquote class="blockquote font-16">
                                      
                                        <dl class="row mb-0">
                                            <dt class="col-sm-5">Nama Ketua Kelompok</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->nama }}</dd>

                                            <dt class="col-sm-5">Tanggal Lahir</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->tgl_lahir }}</dd>

                                            <dt class="col-sm-5">Jenis Kelamin</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->jenis_kelamin }}</dd>

                                            <dt class="col-sm-5">Jenis Identitas </dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->janis_identitas }}</dd>

                                            <dt class="col-sm-5">No Identitas</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->no_identitas }}</dd>

                                            <dt class="col-sm-5">Tanggal Lahir</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->tgl_lahir }}</dd>

                                            <dt class="col-sm-5">Alamat</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->alamat }}</dd>

                                            <dt class="col-sm-5">Kota Asal</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->kota_asal }}</dd>

                                            <dt class="col-sm-5">No Hedpone</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->no_hp }}</dd>

                                            <dt class="col-sm-5">No Hedpone Lain</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->no_hp_lain }}</dd>

                                            <dt class="col-sm-5">Email</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->email }}</dd>

                                            <dt class="col-sm-5">Foto Identitas</dt>
                                            <dd class="col-sm-7">: {{ $orders->pendakis->image_identitas }}</dd>
                                           
                                        </dl>
                                       </blockquote>

                                </div>

                              </div>

																
                            </div>
                        </div>

                    
                    </div> <!-- end col -->

                    {{-- <?php echo $pendaki = Pendaki::where(['id_jadwal' => $orders->jadwals->id])->count(); ?> --}}
                    <?php echo $pendaki = Pendaki::where(['id_jadwal' => $orders->jadwals->id])->where(['status' => 1])->count(); ?>
                    

                    <div class="col-xl-12">
                        <div class="card m-b-30 text-white bg-primary">
                            <div class="card-body">
                                <blockquote class="card-bodyquote mb-0 text-center">
                                    @if ( $orders->jadwals->kuota <= $pendaki )
                                      <h6>
                                        Kuota Pendakian Sudah Penuh ( Tidak dapat menambah anggota )
                                      </h6>
                                    @else

                                    <h2>
                                      Tambah Anggota Pendakian 
                                    </h2> 
                                    {{-- {{ $orders->jadwals->kuota }}  --}}
                                    {{-- {{ $orders->pendakis->jenis_kelamin }} --}}
                                    {{-- {{ $pendakijumlah->count() }} --}}
                                      <div class="button-items">
                                          {{-- <button type="button" class="btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Anggota</button> --}}
                                          <a href="" type="button" class="btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Anggota</a>
                                        </div>

                                    @endif
                                </blockquote>
                            </div>
                        </div>
                    </div>




                    <form class="" method="post" action="{{ url('/booking-add-order-anggota') }}" enctype="multipart/form-data" > @csrf
                     <!--  Modal content for the above example -->
                     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Isi Data Anggota Kelompok</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                                                                
                                  <div class="row">
                                
                               
                                <div class="col-lg-12">
                                 <h5><span class="badge badge-info">Lengkapi Form Anggota Kelompok</span></h4>
                                </div>

                                                                  <div class="col-lg-6">
                                 <div class="form-group">
                                   <label for="example-text-input" class="col-form-label">Nama Anggota Kelompok</label>
                                   <div>
                                         <input class="form-control" type="text" required name="nama" id="example-text-input" >
                                   </div>
                                 </div>

                                <input class="form-control" type="text" hidden value="{{ $orders->pendakis->id }}" name="status_kelompok" id="example-text-input" >
                                <input class="form-control" type="text" hidden value="{{ $orders->id }}" name="id_order" id="example-text-input" >
                                <input class="form-control" type="text" hidden value="{{$orders->jadwals->id }}" name="id_jadwal" id="example-text-input" >

           
                                 <div class="form-group">
                                   <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                                   <div>
                                     <input class="form-control" required type="date" name="tgl_lahir" id="example-text-input">
                                   </div>
                                 </div>
                                  
                               
                                    <div class="form-group">
                                     <label class="col-form-label">Jenis Kelamin</label>
                                       <select class="form-control" required name="jenis_kelamin">
                                         <option>Select</option>
                                         <option value="Pria">Pria</option>
                                         <option value="Wanita">Wanita</option>
                                       </select>
                                   </div>
              
                                   <div class="form-group">
                                     <label for="example-text-input" class="col-form-label">Jenis Identitas</label>
                                     <div>
                                           <input class="form-control" type="text" required name="janis_identitas" id="example-text-input" >
                                     </div>
                                   </div>
          
                                   <div class="form-group">
                                     <label for="example-text-input" class="col-form-label">Nomer Identitas</label>
                                     <div>
                                       <input class="form-control" required type="text" name="no_identitas" id="example-text-input">
                                     </div>
                                   </div>
             
                                   <div class="form-group">
                                     <label for="example-text-input" class="col-form-label">Upload Foto Identitas</label>
                                     <div>
                                       <input class="form-control" required type="file" name="image_identitas" id="example-text-input">
                                     </div>
                                   </div>
                                                                    </div>

                                                                      <div class="col-lg-6">
                                   <div class="form-group">
                                     <label for="example-text-input" class="col-form-label">Alamat</label>
                                     <div>
                                       <input class="form-control" required type="text" name="alamat" id="example-text-input">
                                     </div>
                                   </div>
                                   
                                   <div class="form-group">
                                      <label for="example-text-input" class="col-form-label">Kota Asal</label>
                                       <div>
                                         <input class="form-control" required type="text" name="kota_asal" id="example-text-input">
                                       </div>
                                    </div>
                                    <div class="form-group has-success">
                                      <label for="inputHorizontalSuccess" class="col-form-label">Email</label>
                                      <div>
                                        <input type="email" class="form-control form-control-success" name="email" required id="inputHorizontalSuccess" placeholder="name@example.com">
                                        <div class="form-control-feedback">Email Harus Aktiv untuk mengirimkan Token Booking.</div>
                                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="example-text-input" class="col-form-label">No Hp</label>
                                       <div>
                                         <input class="form-control" required type="text" name="no_hp" id="example-text-input">
                                       </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="example-text-input" class="col-form-label">No Hp Lain</label>
                                       <div>
                                         <input class="form-control" required type="text" name="no_hp_lain" id="example-text-input">
                                       </div>
                                    </div>
                                   
                                                              </div>
                            </div>
                            
                            <div class="button-items">
                                <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Selesai Lanjutkan Boking</button></div>
                                </div>
                     

                                     {{-- <p>{{ $jadwal->tgl_jadwal }}</p> --}}
                                      </div>
                                  </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->
                            </form>

                    <div class="col-lg-12">
                      <div class="card m-b-30">
                        <div class="card-body">
        
                          <h4 class="mt-0 header-title text-center">Data Anggota Kelompok</h4>
                          <p class="sub-title">Jumlah Pendaki Anda Adalah : {{ $pendakijumlah->count() }} Orang Pendaki </p>
                          <p class="sub-title">Jumlah Harga Tiket yang harus ada bayar : @currency($orders->harga )</p>

                                
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                  <th>Acction</th>
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
                                  <td>
                                    <div class="button-items">
                                      <a href="{{ url('/booking-add-order-anggota-hapus/'.$pendaki->id) }}" type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm"> <i class="icon-delete"></i></a>
                                      <a href="#" type="button" class="btn btn-outline-info waves-effect waves-light btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg{{ $pendaki->id }}"> <i class="icon-pencil"></i></a>
                                    </div>
                                  </td>
                                </tr>
                                
                                <div class="modal fade bs-example-modal-lg{{ $pendaki->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <form class="" method="post" action="{{ url('/booking-add-order-anggota-edit/'.$pendaki->id) }}" enctype="multipart/form-data" > @csrf
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
          
                                              <h5 class="modal-title mt-0" id="myLargeModalLabel">Isi Data Anggota Kelompok</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
          
                                                                                          
                                            <div class="row">
                                          
                                         
                                          <div class="col-lg-12">
                                           <h5><span class="badge badge-info">Form Edit Anggota Kelompok</span></h4>
                                          </div>
          
                                                                            <div class="col-lg-6">
                                           <div class="form-group">
                                             <label for="example-text-input" class="col-form-label">Nama Anggota Kelompok</label>
                                             <div>
                                                   <input class="form-control" type="text" required name="nama" value="{{ $pendaki->nama }}" id="example-text-input" >
                                             </div>
                                           </div>
{{--           
                                          <input class="form-control" type="text" hidden value="{{ $orders->pendakis->id }}" name="status_kelompok" id="example-text-input" >
                                          <input class="form-control" type="text" hidden value="{{ $orders->id }}" name="id_order" id="example-text-input" >
          
                      --}}
                                           <div class="form-group">
                                             <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                                             <div>
                                               <input class="form-control" required value="{{ $pendaki->tgl_lahir }}" type="text" name="tgl_lahir" id="example-text-input">
                                             </div>
                                           </div>
                                            
                                         
                                              <div class="form-group">
                                               <label class="col-form-label">Jenis Kelamin</label>
                                                 <select class="form-control" required name="jenis_kelamin">
                                                   <option selected value="{{ $pendaki->jenis_kelamin }}">{{ $pendaki->jenis_kelamin }}</option>
                                                   <option value="Pria">Pria</option>
                                                   <option value="Wanita">Wanita</option>
                                                 </select>
                                             </div>
                        
                                             <div class="form-group">
                                               <label for="example-text-input" class="col-form-label">Jenis Identitas</label>
                                               <div>
                                                     <input class="form-control" type="text" required value="{{ $pendaki->janis_identitas }}" name="janis_identitas" id="example-text-input" >
                                               </div>
                                             </div>
                    
                                             <div class="form-group">
                                               <label for="example-text-input" class="col-form-label">Nomer Identitas</label>
                                               <div>
                                                 <input class="form-control" required type="text" name="no_identitas" value="{{ $pendaki->no_identitas }}" id="example-text-input">
                                               </div>
                                             </div>
                       
                                             <div class="form-group">
                                               <label for="example-text-input" class="col-form-label">Upload Foto Identitas</label>
                                               <div>
                                                  <input type="file" class="form-control" parsley-type="image" name="image_identitas" placeholder="Foto Petugas"/>
                                                  <input type="hidden" name="current_image" value="{{ $pendaki->image_identitas }}"></input>
                                                 {{-- <input class="form-control" required type="file" value="{{ $pendaki->image_identitas }}" name="image_identitas" id="example-text-input"> --}}
                                               </div>
                                             </div>
                                                                              </div>
          
                                                                                <div class="col-lg-6">
                                             <div class="form-group">
                                               <label for="example-text-input" class="col-form-label">Alamat</label>
                                               <div>
                                                 <input class="form-control" required type="text" value="{{ $pendaki->alamat }}" name="alamat" id="example-text-input">
                                               </div>
                                             </div>
                                             
                                             <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Kota Asal</label>
                                                 <div>
                                                   <input class="form-control" required type="text" value="{{ $pendaki->kota_asal }}" name="kota_asal" id="example-text-input">
                                                 </div>
                                              </div>
                                              <div class="form-group has-success">
                                                <label for="inputHorizontalSuccess" class="col-form-label">Email</label>
                                                <div>
                                                  <input type="email" class="form-control form-control-success" value="{{ $pendaki->email }}" name="email" required id="inputHorizontalSuccess" placeholder="name@example.com">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">No Hp</label>
                                                 <div>
                                                   <input class="form-control" required type="text" name="no_hp" value="{{ $pendaki->no_hp }}" id="example-text-input">
                                                 </div>
                                              </div>
          
                                              <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">No Hp Lain</label>
                                                 <div>
                                                   <input class="form-control" required type="text" name="no_hp_lain" value="{{ $pendaki->no_hp_lain }}" id="example-text-input">
                                                 </div>
                                              </div>
                                             
                                                                        </div>
                                      </div>
                                      
                                          <div class="button-items">
                                             <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Edit Anggota Pendakian</button>
                                          </div>
                               
          
                                               {{-- <p>{{ $jadwal->tgl_jadwal }}</p> --}}
                                                </div>
                                            </div><!-- /.modal-content -->
                                          </div><!-- /.modal-dialog -->
                                        <script>
                                            $(document).ready(function() {
                                                $('form').parsley();
                                            });
                                    </script>
                                        </form>
                                        </div><!-- /.modal -->
                                @endforeach
                              @else
                              <div class="font-14">
                                  <span class="badge badge-danger">Tidak Memiliki Anggota</span>
                              </div>
                            @endif
                                </tbody>
                            </table>

                    							             
                        </div>
                      </div>



                      <div class="col-xl-12">
                          <div class="card m-b-30 text-white bg-info">
                              <div class="card-body">
                                  <blockquote class="card-bodyquote mb-0 text-center">
                                    <h4>
                                      Konfirmasi Booking Pendakian
                                    </h4> 
                                  </blockquote>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <h6>
                                          dengan anda Menyelesaikan Booking , maka anda menyetujui segala ketentuan dan aturan yang ada di gunung Prau
                                        </h6> 
                                        
                                        <p>
                                          Pendakian anda melalui jalur <strong style="color :blue">{{ $orders->jalur_pendakis->nama_jalur }}</strong>  dengan jumlah anggota  <strong style="color :blue">{{ $pendakijumlah->count() }} Orang </strong>
                                          anda Mulai pendakian pada tanggal  <strong style="color :blue"> {{ date('j M, Y', strtotime($orders->jadwals->tgl_jadwal)) }}</strong> dan Turun kembali pada tanggal   <strong style="color :blue"> {{ date('j M, Y', strtotime($orders->tgl_turun)) }} </strong>

                                        </p>
                                      </div>
                                      <div class="col-md-6">
                                          <h4 class="mt-0 header-title">Konfirmasi Pembayaran </h4>
                                          <p >Detail Tiket Masuk Dapat di lihat di Tabel Berikut
                                          </p>
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
                                          </div>
                                        </div>
                                      </div>
                                          <blockquote class="card-bodyquote mb-0 text-center">
                                              <form class="" method="post" action="{{ url('/booking-add-order-selesai-valid/'.$orders->id) }}" enctype="multipart/form-data" > @csrf
                                              <div class="button-items">
                                                  <input type="text" value="1" hidden name="selesi_order">
                                                  {{-- <button type="button" class="btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Anggota</button> --}}
                                                  <button type="submit" class="btn btn-success waves-effect waves-light">Selesai Boking</button>
                                                  {{-- <a href="" type="submit" class="btn btn-success waves-effect waves-light">Selesai Booking</a> --}}
                                                </div>
                                              </form>
                                            </blockquote>

                                    
                              </div>
                          </div>
                      </div>


                    </div>




                    
                     </div>
                     
                    </div> <!-- end col -->


                </div>
               </div>
               
               
               
              </div> <!-- end col -->
                    
                    
									</div>


        @section('app_js')

            
        <!-- Plugins js -->
        <script src="{{ asset('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>   
				
				 <!-- Parsley js -->
         <script src="{{ asset('/plugins/parsleyjs/parsley.min.js') }}"></script>
         {{-- Table --}}


          <!-- Required datatable js -->
          <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
          <!-- Buttons examples -->
          <script src="{{ asset('/plugins/datatables/dataTables.buttons.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/jszip.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/pdfmake.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/vfs_fonts.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/buttons.html5.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/buttons.print.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/buttons.colVis.min.js')}}"></script>
          <!-- Responsive examples -->
          <script src="{{ asset('/plugins/datatables/dataTables.responsive.min.js')}}"></script>
          <script src="{{ asset('/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

          <!-- Datatable init js -->
          <script src="{{ asset('/frontend/pages/datatables.init.js') }}"></script>  

          <script>
              $(function() {
                  $('.table-responsive').responsiveTable({
                      addDisplayAllBtn: 'btn btn-secondary'
                  });
              });
          </script>
        <!-- Plugins Init js -->
				<script src="{{ asset('/frontend/pages/form-advanced.js') }}"></script>
				<!-- Bootstrap inputmask js -->
        <script src="{{ asset('/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
				
				<script>
            $(document).ready(function() {
                $('form').parsley();
            });
				</script>
				
				<script>
            jQuery.browser = {};
                (function () {
                    jQuery.browser.msie = false;
                    jQuery.browser.version = 0;
                    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                        jQuery.browser.msie = true;
                        jQuery.browser.version = RegExp.$1;
                    }
                })();
        </script>

        

        @endsection




@endsection

