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
    

<div class="all-title-box">
		<div class="container text-center">
			<h1>Lengkapi Data Anggota Pendaki<span class="m_1"></span></h1>
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


            <div id="overviews" class="section wb">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="message-box">
                                <h4>Data Pendakian Kelompok</h4>
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
                                  <?php $pendaki = Pendaki::where(['id_jadwal' => $orders->jadwals->id])->where(['status' => 1])->count(); ?>

                                <div class="section-title text-center">
                                    @if ( $orders->jadwals->kuota <= $pendaki )
                                    <h3>Kuota Pendakian Sudah Penuh ( Tidak dapat menambah anggota )</h3>
                                    @else
                                    <h3>Tambah Anggota Pendakian </h3>
                                    <a href="" type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Anggota</a>
                                    @endif
                                </div><!-- end title -->
                            </div><!-- end messagebox -->
                        </div><!-- end col -->
                
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4>Data Pendakian Kelompok</h4>
                        <dl class="row mb-0">
                            <dt class="col-sm-5">Nama Ketua Kelompok</dt>
                            <dd class="col-sm-7">: {{ $orders->pendakis->nama }}</dd>

                            <dt class="col-sm-5">Tanggal Lahir</dt>
                            <dd class="col-sm-7">: {{ date('j M, Y', strtotime($orders->pendakis->tgl_lahir)) }}</dd>

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
                    </div><!-- end messagebox -->
              </div>
          
                </div>
            </div>
            </div>


            <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('{{ asset('frontend/images/parallax_04.jpg')}}');">
              <div class="container">
                  <div class="section-title text-center">
                  <h3>Data Anggota Kelompok</h3>
                  <p>Jumlah Pendaki Anda Adalah : {{ $pendakijumlah->count() }} Orang Pendaki </p>
                  <p>Jumlah Harga Tiket yang harus ada bayar : @currency($orders->harga )</p>

              <div class="table-responsive-xl">
                  <table class="table table-sm table-dark">
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
                            <a href="{{ url('/booking-add-order-anggota-hapus/'.$pendaki->id) }}" type="button" class="btn btn-danger waves-effect waves-light btn-xs">Hapus</a>
                            <a href="#" type="button" class="btn btn-info waves-effect waves-light btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg{{ $pendaki->id }}">Edit</a>
                            
                            
                            
                          </div>
                        </td>
                      </tr>
                      </tbody>
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

                  


              </div><!-- end container -->
          </div><!-- end section -->

          <div class="parallax section dbcolor">
              <div class="container">
                  <div class="card-body">
                      <div class="section-title text-center">
                        <h3>Konfirmasi Booking Pendakian</h3> 
                      </div>

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
                            <div class="text-center">
                              <form class="" method="post" action="{{ url('/booking-add-order-selesai-valid/'.$orders->id) }}" enctype="multipart/form-data" > @csrf
                              <div class="button-items">
                                  <input type="text" value="1" hidden name="selesi_order">
                                  {{-- <button type="button" class="btn btn-outline-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Anggota</button> --}}
                                  <button type="submit" class="btn btn-success waves-effect waves-light">Selesai Boking</button>
                                  {{-- <a href="" type="submit" class="btn btn-success waves-effect waves-light">Selesai Booking</a> --}}
                                </div>
                              </form>
                            </div>

                        
                  </div>
              </div><!-- end container -->
          </div><!-- end section -->


          @if(count($pendakis) > 0)
          @foreach ($pendakis as $pendaki)

          <div class="modal fade bs-example-modal-lg{{ $pendaki->id }}"  role="dialog" aria-labelledby="myModalLabel">
              <form class="" method="post" action="{{ url('/booking-add-order-anggota-edit/'.$pendaki->id) }}" enctype="multipart/form-data" > @csrf
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          
                <div class="modal-content section-title">
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

                     <div class="form-group">
                       <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                       <div>
                         <input class="form-control" required value="{{ $pendaki->tgl_lahir }}" type="text" name="tgl_lahir" id="example-text-input">
                       </div>
                     </div>


                     <div class="form-group">
                      <label class="col-form-label">Jenis Kelamin</label>
                      <div class="form-check">
                          <input class="form-check-input" name="jenis_kelamin" type="radio"@if ($pendaki->jenis_kelamin == "laki-laki" )
                          checked
                          @endif
                          value="laki-laki"
                            id="exampleRadios1" >
                          <label class="form-check-label" for="exampleRadios1">
                              laki-laki
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="jenis_kelamin" type="radio" 
                          @if ($pendaki->jenis_kelamin == "Perempuan" )
                          checked
                          @endif
                          value="Perempuan" 
                           id="exampleRadios2" >
                          <label class="form-check-label" for="exampleRadios2">
                              Perempuan
                          </label>
                        </div>
                    </div>
                      
                   
                        {{-- <div class="form-group">
                         <label class="col-form-label">Jenis Kelamin</label>
                           <select class="form-control" required name="jenis_kelamin">
                             <option selected value="{{ $pendaki->jenis_kelamin }}">{{ $pendaki->jenis_kelamin }}</option>
                             <option value="Pria">Pria</option>
                             <option value="Wanita">Wanita</option>
                           </select>
                       </div> --}}
  
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
                  </form>
                  </div><!-- /.modal -->
                  @endforeach
                  @else
                @endif

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
                              <input class="form-control @error('nama') is-invalid @enderror"  type="text" name="nama" value="{{ old('nama') }}" id="example-text-input" >
                              @error('nama') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                          </div>
                        </div>

                       <input class="form-control" type="text" hidden value="{{ $orders->pendakis->id }}" name="status_kelompok" id="example-text-input" >
                       <input class="form-control" type="text" hidden value="{{ $orders->id }}" name="id_order" id="example-text-input" >
                       <input class="form-control" type="text" hidden value="{{$orders->jadwals->id }}" name="id_jadwal" id="example-text-input" >

  
                        <div class="form-group">
                          <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                          <div>
                              <input class="form-control @error('tgl_lahir') is-invalid @enderror"  type="date" name="tgl_lahir" id="example-text-input" value="{{ old('tgl_lahir') }}">
                              @error('tgl_lahir') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                          </div>
                        </div>
                         
                      
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                            <div class="form-group">
                             <div class="custom-control custom-radio ">
                               <input class="custom-control-input @error('jenis_kelamin') is-invalid @enderror"
                              value="laki-laki" @if(old('jenis_kelamin') == 'laki-laki') checked @endif
                               type="radio" id="customRadio1" name="jenis_kelamin">
                               <label for="customRadio1" class="custom-control-label">Laki-Laki</label>
                             </div>
                             <div class="custom-control custom-radio">
                               <input class="custom-control-input @error('jenis_kelamin') is-invalid @enderror" type="radio" 
                               value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan') checked @endif
                               id="customRadio2" name="jenis_kelamin">
                               <label for="customRadio2" class="custom-control-label">Perempuan</label>
                             </div>
                             @error('jenis_kelamin') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                           </div>
                          </div>
     
                          <div class="form-group">
                              <label class="col-form-label">Jenis Identitas</label>
                                <select class="form-control @error('janis_identitas') is-invalid @enderror" required name="janis_identitas">
                                  <option value="">Pilih identitas</option>
                                  <option value="KTP" @if(old('janis_identitas') == 'KTP')selected @endif>KTP</option>
                                  <option value="SIM" @if(old('janis_identitas') == 'SIM')selected @endif>SIM</option>
                                  <option value="KTP" @if(old('janis_identitas') == 'KARTU PELAJAR')selected @endif>Kartu Pelajar</option>
                                </select>
                                @error('janis_identitas') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                            </div>
 
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Nomer Identitas</label>
                                <div>
                                  <input class="form-control @error('no_identitas') is-invalid @enderror" required type="text" name="no_identitas" id="example-text-input" value="{{ old('no_identitas') }}">
                                  @error('no_identitas') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                                </div>
                              </div>
    
                          <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Upload Foto Identitas</label>
                            <div>
                                <input class="form-control @error('image_identitas') is-invalid @enderror" required type="file" name="image_identitas" id="example-text-input" value="{{ old('image_identitas') }}">
                                <div class="form-control-feedback">File Harus di bawah 2 MB || Format file JPG/PNG</div>
                                @error('image_identitas') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                            </div>
                          </div>
                         </div>

                       <div class="col-lg-6">
                          <div class="form-group">
                              <label for="example-text-input" class="col-form-label">Alamat</label>
                              <div>
                                <input class="form-control @error('alamat') is-invalid @enderror" required type="text" name="alamat" id="example-text-input" value="{{ old('alamat') }}" >
                                @error('alamat') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                              </div>
                             </div>
                          
                          <div class="form-group">
                             <label for="example-text-input" class="col-form-label">Kota Asal</label>
                              <div>
                                  <input class="form-control @error('kota_asal') is-invalid @enderror" required type="text" name="kota_asal" id="example-text-input" value="{{ old('kota_asal') }}">
                                  @error('kota_asal') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                              </div>
                           </div>

                           <div class="form-group has-success">
                             <label for="inputHorizontalSuccess" class="col-form-label">Email</label>
                             <div>
                                        <input type="email" class="form-control form-control-success @error('email') is-invalid @enderror" required name="email" id="inputHorizontalSuccess" value="{{ old('email') }}" placeholder="name@example.com">
                                        <div class="form-control-feedback">Email Harus Aktiv untuk mengirimkan Token Booking.</div>
                                  @error('email') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                             </div>
                           </div>
                           <div class="form-group">
                             <label for="example-text-input" class="col-form-label">No Hp</label>
                              <div>
                               <input class="form-control @error('no_hp') is-invalid @enderror" required type="text" name="no_hp" id="example-text-input" value="{{ old('no_hp') }}">
                             @error('no_hp') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                              </div>
                           </div>

                           <div class="form-group">
                             <label for="example-text-input" class="col-form-label">No Hp Lain</label>
                              <div>
                                  <input class="form-control @error('no_hp_lain') is-invalid @enderror" required type="text" name="no_hp_lain" id="example-text-input" value="{{ old('no_hp_lain') }}">
                                  @error('no_hp_lain') <div class="invalid-feedback" >{{ $message }}</div> @enderror
                              </div>
                           </div>
                          
                        </div>
                   </div>
                   
                        <div class="button-items">
                       <button type="submit" class="btn btn-primary btn-lg btn-block waves-effect waves-light">Tambah Anggota</button></div>
                       </div>
            

                            {{-- <p>{{ $jadwal->tgl_jadwal }}</p> --}}
                             </div>
                         </div><!-- /.modal-content -->
                       </div><!-- /.modal-dialog -->
                     </div><!-- /.modal -->
                   </form>

       
        @section('app_js')

            
       

        @endsection

@endsection

