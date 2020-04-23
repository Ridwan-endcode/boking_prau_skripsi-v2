 
 
 <?php
 use App\Http\Controllers\Controller;
 $mainTransaksi = Controller::mainTransaksi();
 ?>
<div id="app">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
    
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <message-component></message-component>
          <!-- Messages Dropdown Menu -->
          {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">{{ $mainTransaksi->count() }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div style="padding: 10px; overflow: scroll; height: 300px;">
                    
          @if(count($mainTransaksi) > 0)
             @foreach ($mainTransaksi as $transaksi)
              <a href="{{ url('/administrator/view-order-lihatpendaki/'.$transaksi->orders->token_pendakian) }}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                        Nama Pengirim {{ $transaksi->nama_pengirim }}
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Token Pendakian {{ $transaksi->orders->token_pendakian }} </p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              @endforeach
              @else
                      <p>Tidak Ada Notifikasi</p>
              @endif
              
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
            </div>
          </li>
           --}}
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
</div>