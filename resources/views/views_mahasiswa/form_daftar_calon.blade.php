@extends('layouts_views.layout_user')

@section('content')
<!-- Content -->
<div class="content">	
	<div style="width: 80%; margin: 20px auto">
		<div style="margin: 30px auto; text-align: center;">
			<h4 style="text-transform: capitalize;">Formulir Pendaftaran Calon Ketua <br> Agenda {{ $tb->nm_agenda }}</h4>
			<hr>
		</div>
		<form action="/daftar kandidat/{{$tb->id}}" method="POST" enctype="multipart/form-data">
			<h5 style="text-transform: capitalize;">I. BIODATA DIRI</h5>
			{{csrf_field()}}
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Nama</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="nama" readonly="readonly" value="{{Auth::user()->nama}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Jenis Kelamin</label>
					<div class="col-sm-8">
						<label><input type="radio" name="jen_kelamin" required="" value="lk" @if(old('jen_kelamin')) checked @endif> Laki-laki</label><br>
						<label><input type="radio" name="jen_kelamin" required="" value="pr" @if(old('jen_kelamin')) checked @endif> Perempuan</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Tempat, Tanggal Lahir</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="tmp_lahir" value="{{old('tmp_lahir')}}" style="width: 30%;float: left;">
						<input type="date" name="tgl_lahir" required="" class="form-control" value="{{old('tgl_lahir')}}" style="width: 30%;float: left;">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">NIM</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="nim" readonly="readonly" value="{{Auth::user()->nim}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Jurusan/Fakultas</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" required="" name="jurusan" readonly="readonly" value="{{Auth::user()->jurusan}}">
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" required="" name="fakultas" readonly="readonly" value="{{Auth::user()->fakultas}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Foto</label>
					<div class="col-sm-8">
						<span class="text-danger">{{ $errors->first('foto')}}</span> 
						<input type="file" name="foto" accept="image/*" onchange="readURL(this);" required="">
          				<span class="help-block"><i> max 2MB </i></span>
          	          	<!-- js show image -->
				        <script type="text/javascript">
				            function readURL(input) {
				              if (input.files && input.files[0]) {
				                var reader = new FileReader();

				                reader.onload = function(e) {
				                  $('#cek-gambar')
				                    .attr('src', e.target.result);
				                };
				                reader.readAsDataURL(input.files[0]);
				              }
				            }
				        </script>
				        <!--end-->
				        <div class="showimage">
				            <img id="cek-gambar" src="#" alt="" width="100%" height="100%">
				        </div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Agama</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" value="{{old('agama')}}" name="agama">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">No Hp</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" value="{{old('no_hp')}}" name="no_hp">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" required="" value="{{old('email')}}" name="email">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Media Sosial</label>
					<div class="col-sm-8">
						<div class="row">
							<label class="control-label col-sm-2">Facebook</label>
							<input type="text" class="form-control col-sm-5" required="" value="{{old('medsos1')}}" name="medsos1">
						</div>
						<div class="row">
							<label class="control-label col-sm-2">Twitter</label>
							<input type="text" class="form-control col-sm-5" required="" value="{{old('medsos2')}}" name="medsos2">
						</div>
						<div class="row">
							<label class="control-label col-sm-2">Instagram</label>
							<input type="text" class="form-control col-sm-5" required="" value="{{old('medsos3')}}" name="medsos3">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Blog/Website</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="blog" value="{{old('blog')}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Anak Ke-</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" required="" name="anak_ke" value="{{old('anak_ke')}}">
					</div>
					<label class="control-label col-sm-1">dari - </label>
					<div class="col-sm-2">
						<input type="text" class="form-control" required="" name="jum_saudara" value="{{old('jum_saudara')}}">
					</div>
					<label class="control-label col-sm-1">Saudara</label>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Asal SMA</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="asal_sma" value="{{old('asal_sma')}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Asal Daerah</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="asal_daerah" value="{{old('asal_daerah')}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Motto Hidup</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="motto" value="{{old('motto')}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Motivasi jadi Ketua </label>
					<div class="col-sm-8">
						<textarea class="form-control" required="" name="motivasi" rows="4">{{old('motivasi')}}</textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Transkrip Nilai</label>
					<div class="col-sm-8">
						<span class="text-danger">{{ $errors->first('transkrip_nilai')}}</span> 
						<input type="file" required="" name="transkrip_nilai">
						<span class="help-block"><i> max 2MB </i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Visi</label>
					<div class="col-sm-8">
						<input type="text" required="" autocomplete="off" name="visi" value="{{old('visi')}}" class="form-control" placeholder="Masukan visi anda">
					</div>
				</div>
			</div>
 			<!-- <div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Misi</label>
					<div class="col-sm-8">
						<div>
							<p class="text-muted" style="float: left;">*click the (+) or (-) button.</p>
							<a href="javascript:void(0)" id="btRemove" class="btn-misi"><i class='fas fa-minus' style=""></i></a>
							<a href="javascript:void(0)" id="btAdd" class="btn-misi"><i class='fas fa-plus' style=""></i></a>
							<div class="clear"></div>	
						</div>
						<div id="main"></div>
					</div>
				</div>
			</div>	 -->
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Misi</label>
					<div class="col-sm-8">
						<textarea name="misi" required="" class="ckeditor" id="ckedtor">{!! old('misi') !!}</textarea>
					</div>
				</div>
			</div>

			<hr>
			<h5 style="text-transform: capitalize;">II. DAFTAR RIWAYAT HIDUP</h5>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-8">
						<span class="text-danger">{{ $errors->first('riwayat_hidup')}}</span><br>
						<input type="file" name="riwayat_hidup" required="">
          				<span class="help-block"><i> max 2MB </i></span><br>
						<a href="/uploads/temp_riwayat_hidup/{{$tb->temp_riwayat_hidup}}" download="">Download Template</a><br>
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group form-check">
				<div class="row">
					<label class="control-label col-sm-4"></label>
					<div class="col-sm-8">
			    		<label class="form-check-label">
							<input type="checkbox" name="" required=""> Saya menyetujui <a href="javascript::void(0)" data-toggle="modal" data-target="#myModalTerms">kebijakan &amp; persyaratan</a> pencalonan.
						</label>
					</div>
				</div>
			</div>
			<div class="form-group form-check">
				<div class="row">
					<label class="control-label col-sm-4"></label>
					<div class="col-sm-8">
			    		<label class="form-check-label">
							<input type="checkbox" name="" required=""> Saya menyetujui <a href="javascript::void(0)" data-toggle="modal" data-target="#myModalSP">surat pernyataan</a> pencalonan.
						</label>
					</div>
				</div>
			</div>

			<div class="right">
				<input type="submit" value="Daftar" class="btn btn-primary">
				<a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
			</div>

			<div class="clear"></div>
		</form>

		<!-- The Modal -->
		<div class="modal fade" id="myModalTerms" role="dialog">
		    <div class="modal-dialog">
		    	<div class="modal-content">
			        <!-- Modal Header -->
			        <div class="modal-header">
			        	<h6 class="modal-title">Kebijakan dan persyaratan pencalonan</h6>
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			        	{!! $tb->syaratketentuan !!}
			        </div>

			        <div class="modal-footer"> 	
			        	<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
			        </div>
		    	</div>
		    </div>
		</div>
		<!--End The Modal-->

		<!-- The Modal -->
		<div class="modal fade" id="myModalSP">
		    <div class="modal-dialog modal-lg">
		    	<div class="modal-content">
			        <!-- Modal Header -->
			        <div class="modal-header">
			        	<h6 class="modal-title">Surat Pernyataan Calon Ketua</h6>
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <div class="modal-body">
		       			<div class="form-group">
							<!-- <iframe src="/uploads/surat_pernyataan/{{$tb->surat_pernyataan}}" style="width: 100%; height: 450px"></iframe> -->
							<embed src="/uploads/surat_pernyataan/{{$tb->surat_pernyataan}}" style="width: 100%; height: 450px; border: 1px solid black"></embed>
						</div>
			        </div>
			        <div class="modal-footer"> 	
			        	<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
			        </div>
		    	</div>
		    </div>
		</div>
		<!--End The Modal-->

		<script type="text/javascript">
			$('#myModalTerms').modal('show');

		    $(document).ready(function() {
		        var iCnt = 0;
		        // CREATE A "DIV" ELEMENT.
		        var container = $(document.createElement('div'));
		        $('#btAdd').click(function() {
		                iCnt++;
		                // ADD TEXTBOX.
		                $(container).append('<input type=text name="misi" class="form-control" id=misi'+iCnt+' '+'placeholder="Misi ' + iCnt + '" />');
		                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
		                $('#main').after(container);
		        });

		        // REMOVE ONE ELEMENT PER CLICK.
		        $('#btRemove').click(function() {
		            if (iCnt != 0) { 
		            	$('#misi' + iCnt).remove(); 
		            	iCnt--; 
		            }
		        });
		    });
		</script>
	</div>
</div>
<!-- /Content -->

@endsection