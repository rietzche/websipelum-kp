@extends('layouts.layout')

@section('link')
	<li class="active">Detail Agenda</li>
@endsection

@section('content')
		<!-- /////////////////////////Header////////////////////////////////////////// -->
		<div class="page-header-content">
			<div class="page-title">
				<p>Agenda Tanggal <b>{{ date('d M Y', strtotime((App\Agenda::find($IdAgenda))->tgl_agenda)) }}</b></p>
				<h4><span class="text-semibold" style="text-transform: uppercase;">{{ (App\Agenda::find($IdAgenda))->nm_agenda }}</span></h4>
				<p>Kategori Pemilih : {{ (App\Agenda::find($IdAgenda))->kat_jurusan }} <b>({{(App\Agenda::find($IdAgenda))->kat_fakultas}})</b> </p>
			</div>
			<div class="heading-elements">
				<h4>{{ (App\Agenda::find($IdAgenda))->metodep }}</h4>
			</div>
		</div>
		<!-- /////////////////////////Header////////////////////////////////////////// -->
		<br>
		<!-- Pricing table -->
		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
				<li><a href=""><i class="glyphicon glyphicon-forward"></i></a> Kandidat</li>
			</ul>
		</div>

		@if(Session::has('pesan'))
			<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesan') }} !
			</div>
		@endif

		@if(Session::has('pesanErr'))
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesanErr') }} !
			</div>
		@endif

	    <!-- Basic datatable -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_large1">Tambah</i></button>
			</div>
			<!-- Large modal -->
			<div id="modal_large1" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h5 class="modal-title">Form Penambahan Calon</h5>
						</div>
						
						<form action="/tambah kandidat" method="POST" class="form-horizontal" enctype="multipart/form-data">
						<div class="modal-body">	
								{{ csrf_field() }}
								<div class="panel panel-flat">										
									<div class="panel-body">
										<div class="form-group">
											<label class="col-lg-3 control-label">NIM</label>
											<div class="col-lg-9">
												<input type="nummber" name="nim" class="form-control" required="" placeholder="1234567890">
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Foto</label>
											<div class="col-lg-9">
												<input type="file" class="file-styled" name="foto" required="" accept="image/*">
												<span class="help-block">Accepted formats: png, jpg. Max file size 2Mb</span>
											</div>
										</div>
								
										<input type="hidden" name="agenda_id" value="{{$IdAgenda}}">

										<div class="form-group">
											<label class="col-lg-3 control-label">Visi</label>
											<div class="col-lg-9">
												<textarea class="form-control" name="visi" required="" placeholder="Masukan visi calon" rows="5"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-lg-3 control-label">Misi</label>
											<div class="col-lg-9">
												<textarea class="form-control" name="misi" required="" placeholder="Masukan misi calon" rows="5"></textarea>
											</div>
										</div>

									</div>
								</div>
							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /large modal -->

			<table class="table datatable-basic">
				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Foto</th>
						<th>Jurusan</th>
						<th>Angkatan</th>
						<th>Visi</th>
						<th>Misi</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					{{! $no = 1}}
					@foreach($tbK as $dt)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$dt->nim}}</td>
						<td>{{$dt->nama}}</td>
						<td><img src="{{ url('uploads/file/'.$dt->foto) }}" alt="" style="width: 90px; float: left; height: 100px"> </td>
						<td>{{$dt->jurusan}}</td>
						<td>{{$dt->angkatan}}</td>
						<td>{{$dt->visi}}</td>
						<td>{{$dt->misi}}</td>
						<td class="text-center">
							<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="/edit balon/{{ $dt->id }}"><i class="icon-compose"></i> Edit Data</a></li>
										<script>
										  	function ConfirmDelete() {
										  		var x = confirm("Yakin Akan Menghapus Data?");
										  		if (x)
										    		return true;
										  		else
										    		return false;
										  	}
										</script>
										<li><a href="/hapus balon/{{ $dt->id }}/{{ $IdAgenda }}" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /basic datatable --> 

		<!-- //////////////////////////////////////Daftar Pemilih Tetap//////////////////////////////////////// -->

		<!-- Pricing table -->
		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
				<li><a href=""><i class="glyphicon glyphicon-forward"></i></a> Daftar Pemilih Tetap</li>
			</ul>
		</div>

		@if(Session::has('pesanP'))
			<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesanP') }} !
			</div>
		@endif

		<!-- Basic datatable -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				@if(count($tbP)==0)
					<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_large">Import Data</i></button>
				@else
					<script>
					  	function ConfirmDelete() {
					  		var x = confirm("Yakin Akan Menghapus Data?");
					  		if (x)
					    		return true;
					  		else
					    		return false;
					  	}
					</script>
					<a href="/reset pemilih/{{$IdAgenda}}" onclick="return ConfirmDelete()" class="btn btn-default btn-sm">Reset Data</a>
				@endif
				<div style="float: right;">
					<button type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-print"></i> Cetak Data</button>
				</div>
			</div>

			<!-- Large modal -->
			<div id="modal_large" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h5 class="modal-title">Data Mahasiswa</h5>
						</div>

						<form action="/tambah pemilih" method="POST">
							{{ csrf_field() }}
							<div class="modal-body">
									<table class="table datatable-basic">
										<thead>
											<tr>
												<th>No</th>
												<th>NIM</th>
												<th>Nama</th>
												<th>Jurusan</th>
												<th>Fakultas</th>
												<th>Tahun Angkatan</th>
												<th class="text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											{{! $no=1 }}
											<div style="display: none;">{{! $jum=0 }}</div>

											@foreach($tbMhs as $dt)
											<div style="display: none;">{{! $jum++ }}</div>
											<tr>
												<td>{{ $n =  $no++ }}</td>
												<td>
													{{ $dt->nim }}
													<input type="hidden" name="nim[{{$n}}]" value="{{ $dt->nim }}">
												</td>
												<td>
													{{ $dt->nama }}
													<input type="hidden" name="nama[{{$n}}]" value="{{ $dt->nama }}">
												</td>
												<input type="hidden" name="agenda_id[{{$n}}]" value="{{ $IdAgenda }}" readonly="">
												<input type="hidden" name="username[{{$n}}]" value="{{ $dt->nim }}" readonly="">
												<td>{{ $dt->jurusan }}</td>
												<td>{{ $dt->fakultas }}</td>
												<td>{{ $dt->th_angkatan }}</td>
												<td class="text-center">
													<input type="checkbox" class="styled" checked="checked"> 
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
							</div>
							<input type="hidden" name="jumArr" value="{{ $jum }}" readonly="">
							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								@if($no==1)
								@else
									<button type="submit" class="btn btn-primary">Export</button>
								@endif
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /large modal -->

			<table class="table datatable-basic">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Password</th>
						<th>Keterangan</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					{{!$no=1}}
					@foreach($tbP as $dt)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$dt->nama}}</td>
						<td>{{$dt->username}}</td>
						<td>{{ $dt->passwordshow}}</td>
						<td>
							@if($dt->vote = 'Belum Memilih')
							<span class="label label-info">{{ $dt->ket_vote }}</span>
							@else
							<span class="label label-success">{{ $dt->ket_vote }}</span>
							@endif
						</td>
						<td class="text-center">
							<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href=""><i class="icon-compose"></i> Edit Data</a></li>
										<script>
										  	function ConfirmDelete() {
										  		var x = confirm("Yakin Akan Menghapus Data?");
										  		if (x)
										    		return true;
										  		else
										    		return false;
										  	}
										</script>
										<li><a href="" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
									</ul>
								</li>
							</ul>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /basic datatable --> 

@endsection