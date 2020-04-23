@extends('layouts.adminLayout.admin_desing')

@section('app_css')
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Validasi Booking Pendakian</h1>
             </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/administrator/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Validasi Pendakian</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (Session::has('flash_message_success'))
<div class="col-md-12">
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Success</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
          {!! session('flash_message_success') !!}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

@endif
@if (Session::has('flash_message_error'))
<div class="col-md-12">
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Ada Kesalahan</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
          {!! session('flash_message_error') !!}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endif




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">

          @if ($orders->id_transaksi == null)
          @if (empty($orders->transak->nama_pengirim))
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h7>Pendaki Belum Melakukan Pembayaran</h7>
  
                  <p>Lakukan Pembayaran Di tempat</p>
                  <p> Jumlah yang Harus di bayar : @currency($orders->harga) </p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-check-alt"></i>
                  {{-- <i class="ion ion-bag"></i> --}}
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-warning">Lakukan Pembayaran di Tempat <i class="fas fa-arrow-circle-right"></i></a>
                <div class="modal fade" id="modal-warning">
                    <div class="modal-dialog">
                      <div class="modal-content bg-warning">
                        <div class="modal-header">
                          <h4 class="modal-title">Warning Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('/administrator/view-order-validasipembayaran/') }}" enctype="multipart/form-data" > @csrf
                            
                              <div class="row">
                                  <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                      <label>Nama Pembayar</label>
                                      <input type="text" class="form-control"  name="nama_pengirim" placeholder="Isi Nama Pembayar">
                                      <input class="form-control" type="text" name="id_order" hidden value="{{ $orders->id }}"  id="example-text-input">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Jumlah Pembayaran</label>
                                      <input type="number" value="{{ $orders->harga }}"  required class="form-control"  placeholder="@currency($orders->harga)" disabled>
                                      <input type="number" value="{{ $orders->harga }}" name="jumlah" required class="form-control"  placeholder="@currency($orders->harga)" hidden>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>Bukti Pembayaran</label>
                                      <input class="form-control" type="file" placeholder="Opsional"  name="foto_bukti" id="example-text-input">
                                    </div>
                                  </div>
                                  
                                </div>
              

                            
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-outline-dark">Save changes</button>
                        </div>
                      </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
              </div>
            </div>

              @endif
            @else
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h7>Pendaki Talah Melakukan Pembayaran</h7>
                    <p> Jumlah yang Harus di bayar : @currency($orders->harga) </p>
                    <p>Telah Melakukan Pembayaran pada : <br> {{ date('j M, Y h:i:sa', strtotime($orders->transak->created_at)) }}</p>
                    <p>Telah Melakukan Pembayaran pada : <br> {{$orders->transak->created_at->diffForHumans()}}</p>
                    
                  </div>
                  <div class="icon">
                    <i class="fas fa-search-dollar"></i>
                  </div>
                  <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-info">Lihat Transaksi <i class="fas fa-arrow-circle-right"></i></a>
                  @if (empty($orders->status_bayar))
                  <a href="#" class="small-box-footer">Belum Di lakukan Validasi</a>
                  @else
                  <a href="#" class="small-box-footer">Sudah Di lakukan oleh : {{ $orders->users->name }} <br> Kirim Validasi <i class="fab fa-whatsapp"></i></a>

                  @endif


                  <div class="modal fade" id="modal-info">
                      <div class="modal-dialog">
                        <div class="modal-content bg-info">
                          <div class="modal-header">
                            <h4 class="modal-title">Lakukan Validasi Pembayaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col-sm-6">
                                      <!-- text input -->
                                      <div class="form-group">
                                        <label>Nama Pembayar</label>
                                        <input type="text" class="form-control"  placeholder="{{ $orders->transak->nama_pengirim }}" disabled>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Jumlah Pembayaran</label>
                                        <input type="number"  required class="form-control"  placeholder="@currency($orders->transak->jumlah)" disabled>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                          <label>No Rek</label>
                                          <input type="text" class="form-control"  placeholder="{{ $orders->transak->no_rek }}" disabled>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Melalui Bank</label>
                                          <input type="number"  required class="form-control"  placeholder="{{ $orders->transak->bank }}" disabled>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <!-- textarea -->
                                      <div class="form-group">
                                        <label>Bukti Pembayaran</label>
                                        <a href="{{ asset('image/buktitransaksi/'.$orders->transak->foto_bukti) }}" target="out" data-toggle="lightbox" data-title="sample 1 - white">
                                          <img src="{{ asset('image/buktitransaksi/'.$orders->transak->foto_bukti) }}" class="img-fluid mb-2" alt="white sample"/>
                                        </a>
                                      </div>
                                    </div>
                                    
                                  </div>
                
  
                              
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                            @if ($orders->status_bayar == null)
                            <a href="{{ url('/administrator/view-order-validasipembayaran/'.$orders->token_pendakian) }}" type="button" class="btn btn-primary">Validasi Pembayaran</a>
                            @else
                            <a href="{{ url('/administrator/view-order-batalpembayaran/'.$orders->token_pendakian) }}" type="button" class="btn btn-danger">Batalkan Transaksi</a>
                            @endif
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                </div>
              </div>
              @endif

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h5>Absen Pendakian</h5>
  
                  <p>Jadwal Pendakian : {{ date('j M, Y', strtotime($orders->jadwals->tgl_jadwal)) }} -- Tidak bisa di Absen jika tanggal absen 
                      tidak sesuai dengan tanggal pendakian</p>
                </div>
                <div class="icon">
                  <i class="fas fa-hiking"></i>
                </div>
                <a href="{{ url('/administrator/view-order-absendatang/'.$orders->token_pendakian) }}" class="small-box-footer">Absen Pendakian <i class="fas fa-mountain"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h5>Download Tiket Pendakian</h5>
  
                  <p>Download Tiket Bisa di lakukan setelah melakukan Pembayaran</p>
                </div>
                <div class="icon">
                  </i><i class="fas fa-bookmark"></i>
                </div>
                <a href="#" class="small-box-footer">Download   <i class="fas fa-download"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
  
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                      <i class="fas fa-hiking"></i>
                    Pendaki
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Ketua Kelompok</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Lihat Anggota Kelompok</a>
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart"
                         style="position: relative; height: 300px;">
                         <div class="card-body" style="padding: 10px; overflow: scroll; height: 300px;">
                            <dl class="row">
                              <dt class="col-sm-4">Nama</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->nama }}</dd>
                              <dt class="col-sm-4">Tgl lahir</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->tgl_lahir }}</dd>
                              <dt class="col-sm-4">Jenis kelamin</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->jenis_kelamin }}</dd>
                              <dt class="col-sm-4">Jenis identitas</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->janis_identitas }}</dd>
                              <dt class="col-sm-4">No identitas</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->no_identitas }}</dd>
                              <dt class="col-sm-4">Email</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->email }}</dd>
                              <dt class="col-sm-4">Kota Asal</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->kota_asal }}</dd>
                              <dt class="col-sm-4">No Hp</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->no_hp }}</dd>
                              <dt class="col-sm-4">No Hp Lain</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->no_hp_lain }}</dd>
                              <dt class="col-sm-4">Alamat</dt>
                              <dd class="col-sm-8">{{ $orders->pendakis->alamat }}</dd>
                            </dl>
                          </div>                      
                     </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                      <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table id="example1" class="table table-bordered table-hover">
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
                                @else
                                <span class="badge badge-danger">Tidak Memiliki Anggota</span>
                                @endif
                            </tbody>
                          </table>  
                         
                        </div>   
                                     
                    </div>  
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
  
           
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
  
              <!-- Map card -->
              <div class="card bg-gradient-primary">
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Info Pendakian
                  </h3>
                  <!-- card tools -->
                  <div class="card-tools">
               
                    <button type="button"
                            class="btn btn-primary btn-sm"
                            data-card-widget="collapse"
                            data-toggle="tooltip"
                            title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
            
              <div class="card-body">
                  <dl class="row">
                    <dt class="col-sm-4">Tanggal Pendakian</dt>
                    <dd class="col-sm-8"> {{ date('j M, Y', strtotime($orders->jadwals->tgl_jadwal)) }}</dd>
                    <dt class="col-sm-4">Tanggal Turun Pendakian</dt>
                    <dd class="col-sm-8">{{ date('j M, Y', strtotime($orders->tgl_turun)) }}</dd>
                    <dt class="col-sm-4">Jumlah Pendaki</dt>
                    <dd class="col-sm-8">{{ $pendakijumlah->count() }} Orang</dd>
                    <dt class="col-sm-4">Biaya Pendakian :</dt>
                    <dd class="col-sm-8"><span class="badge badge-success font-16">@currency($orders->harga )</span>
                    </dd>
                  </dl>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
            
  
           
            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->



</div>

@section('app_js')
 <!-- DataTables -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection

@endsection