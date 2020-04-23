<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header tit-up">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Masukan Berdasarkan Token</h4>
          </div>
          <div class="modal-body customer-box">
             
              <!-- Tab panes -->
              <div class="tab-content">
                      <form role="form" class="form-horizontal">
                          <div class="form-group">
                              <div class="col-sm-12">
                                  <input class="form-control" placeholder="Masukan Token Anda" id="email1" placeholder="Name" type="text">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-light btn-radius btn-brd grd1">
                                      Submit
                                  </button>
                              </div>
                          </div>
                      </form>
                
              </div>
          </div>
      </div>
    </div>
  </div>



  <!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="{{ asset('frontend/images/logo.png') }}" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/booking-pilih-jalurpendakian') }}">Mulai Booking</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Lihat Peta Jalur </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">Jalur Desa Petak Banteng</a>
								<a class="dropdown-item" href="#">Jalur Dieng Kulon </a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Mekanisme Booking </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">Aturan Booking </a>
								<a class="dropdown-item" href="#">Alur Booking Online </a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Cek Validasi Booking</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->