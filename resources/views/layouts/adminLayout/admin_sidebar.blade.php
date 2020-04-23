 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{ asset('frontend/images/logo.png') }}"  width="200px"
               style="opacity: .8">
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset("backend/images/profile/") }}/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              
              <li class="nav-item">
                <a href="{{ url('administrator/view-admin') }}" class="nav-link">
                <i class=" nav-icon far fa-address-book"></i>
                  <p>
                    Kelola User
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Jadwal Pendakian
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/administrator/add-jadwal') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Data Jadwal</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/administrator/view-jadwal') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lihat Semua Jadwal Pendakian</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                  <a href="{{ url('/administrator/view-jalurpendakian') }}" class="nav-link">
                    <i class="nav-icon fas fa-map-signs"></i>
                    <p>
                      Kelola Jalur Pendakian
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/administrator/view-order-all') }}" class="nav-link">
                      <i class="nav-icon fas fa-hiking"></i>
                      <p>
                        Booking Pendakian
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ url('logout') }}" class="nav-link">
                      <i class=" nav-icon fas fa-sign-out-alt"></i>
                        <p>
                        Log Out
                        </p>
                      </a>
                    </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>