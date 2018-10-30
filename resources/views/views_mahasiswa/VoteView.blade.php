@extends('views_mahasiswa.LayoutUser')

@section('nav-item')
	<li class="nav-item">
			<a class="nav-link" href="/" style="padding: 10px;">Beranda</a>
  	</li>
  	<span class="span">|</span>
  	<li class="nav-item">
  		<a class="nav-link active" href="/pemilihan" style="padding: 10px;">Pemilihan</a>
  	</li>
  	<span class="span">|</span>
  	<li class="nav-item">
    	<a class="nav-link" href="/hitung cepat" style="padding: 10px;">Hitung Cepat</a>
  	</li>
  	<span class="span">|</span>
  	<li class="nav-item dropdown">
    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" style="padding: 10px;">Daftar </a>
    	 <div class="dropdown-menu">
	      <a class="dropdown-item" href="#">Calon Kandidat</a>
	    </div>
  	</li>
  	<span class="span">|</span>
  	<li class="nav-item">
    	<a class="nav-link" href="javascript:void(0)" style="padding: 10px;">Syarat & Ketentuan</a>
  	</li>
@endsection

@section('content')
  <!-- content -->
  <div class="content" style="margin-top: 10px">
    <!-- list-content -->
    <div class="list-content-info">
      <h5 style="margin: 8px;float: left;">Pemilihan - </h5>
      <p style="margin: 8px;float: right;">{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }}</p>
    <div class="clear"></div>
    </div>
    <!-- /list-content -->

    <!-- content-vote -->
  	<div class="content-vote">
  		@for($i=0; $i<=3; $i++)
  		<div class="panel-kandidat bg-light">
  			<div class="foto-kandidat"">
  				<img src="assets/images/placeholder.jpg" style="width: 100%; height: 230px;" alt="">
  			</div>     
        <div class="caption text-center" style="margin: 15px 0px 0px 0px;">
          <h6 style="margin: 0px">Febri Ardi Saputra</h6>
          <small class="text-info"><i class="fa fa-thumbs-o-up"></i> 5 Votes</small>
          <div class="button-vote">
            <button type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</button>
            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote</button>
            <div class="clear"></div>
          </div>
        </div>
  		</div>
  		@endfor
  		<div class="clear"></div>
  	</div>
    <!-- /content-vote -->
  </div>
<!-- /content -->
@endsection
