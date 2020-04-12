 
 
 <?php
 use App\Http\Controllers\Controller;
 $mainTransaksi = Controller::mainTransaksi();
 ?>

 <!-- Top Bar Start -->
 <div id="app">
 <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="index.html" class="logo">
                <span class="logo-light">
                        <i class="mdi mdi-camera-control"></i> ADMIN PRAU
                    </span>
                <span class="logo-sm">
                        <i class="mdi mdi-camera-control"></i>
                    </span>
            </a> 
        </div>

        <nav class="navbar-custom">
            <ul class="navbar-right list-inline float-right mb-0">
                    <!-- full screen -->
                    {{-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                    </li> --}}
            
                <message-component></message-component> 
            

                {{-- <!-- full screen -->
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                        <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                    </a>
                </li>

                <!-- notification -->
                <li class="dropdown notification-list list-inline-item">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>

                    <span class="badge badge-pill badge-danger noti-icon-badge">{{ $mainTransaksi->count() }}</span>
                    
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                                Notifications
                            </h6>
                        <div class="slimscroll notification-item-list">
                            <!-- item-->

                            
                            <message-component></message-component>
                        @if(count($mainTransaksi) > 0)
                            @foreach ($mainTransaksi as $transaksi)
                                <a href="{{ url('/administrator/view-order-lihatpendaki/'.$transaksi->orders->token_pendakian) }}" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b> Nama Pengirim {{ $transaksi->nama_pengirim }}</b><span class="text-muted">
                                      Token Pendakian {{ $transaksi->orders->token_pendakian }}
                                    </span></p>
                                </a>
                            @endforeach
                        @else
                                <p>Tidak Ada Notifikasi</p>
                        @endif
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                    </div>
                </li> --}}

                <li class="dropdown notification-list list-inline-item">
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            {{-- <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle"> --}}
                            User
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> Wallet</a>
                            <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a> --}}
                            <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ url('logout') }}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                        </div>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <li class="d-none d-md-inline-block">
                    <form role="search" class="app-search">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" placeholder="Search..">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
            </ul>

        </nav>

 </div>
</div>
    <!-- Top Bar End -->