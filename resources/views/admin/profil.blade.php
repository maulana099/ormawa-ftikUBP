@extends('base.adbase')
<title>Admin | Anggota BEM FTIK</title>
@section('content')
<!-- Playlist section -->
<div class="breadcrumbs">
	<div class="breadcrumbs-inner">
		<div class="row m-0">
			<div class="col-sm-12">
				<div class="page-header">
					<div class="page-title col-md-6" style="float: left;">
						<h4 class="">STRUKTURAL BEM FTIK <i class="fa fa-arrow-right" style="padding: 7px;"></i>
							@if(auth()->user()->role_login == 'Ormawa')
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#profil">
								<i class="fa fa-plus"> </i>
							</button>
							@endif
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<!-- Animated -->
	<div class="animated fadeIn">
		<!-- Widgets  -->
		<div class="row">
			@foreach ($data_profil as $profil)
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<div class="card-body text-center">
						<div class="stat-icon dib flat-color-1">
							<img src="{{URL::to('/')}}/public/gambar/{{$profil->fotoP }}" style="max-width: 150px; max-height: 150px;">
						</div>
						<br/>
						<br/>
						<h4>{{$profil->nama}}</h4>
						<h4>{{$profil->jabatan}}</h4>
						<h4>{{$profil->nim}}</h4>
						<a href="https://api.whatsapp.com/send?phone={{$profil->no_hp}}"><h4>{{$profil->no_hp}}</h4></a>
						<h6 style="padding-top: 5px;">
							@if ($profil->status === 'active')
							<span style="background-color: #27AE60; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$profil->status}}</span>
							@else
							<span style="background-color: #FF3333; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$profil->status}}</span>
							@endif
						</h6>
						<hr/>
						@if(auth()->user()->role_login == 'Ormawa')
						<a href="/profil/hapus/{{$profil->id}}" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin hapus data ini.?')" ><i class="fa fa-trash"></i></a>
						<a href="/profil/edit/{{$profil->id}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
						<a href="/profil/status/{{$profil->id}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
						@endif
					</div> 
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="profil" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="largeModalLabel"><b>Tambah Anggota</b></h5>
			</div>
			<div class="modal-body">
				<form action="/profil/add" method="post" enctype="multipart/form-data" class="form-horizontal">
					{{csrf_field()}}
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="password-input" class=" form-control-label">Nama Lengkap</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="text" id="password-input" name="nama" placeholder="" class="form-control" required="" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="email-input" class=" form-control-label">Jabatan</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="text" id="email-input" name="jabatan" placeholder="" class="form-control" required="" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="email-input" class=" form-control-label">Nim</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="text" id="email-input" name="nim" placeholder="" class="form-control" required="" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="email-input" class=" form-control-label">No Hp</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="number" id="email-input" name="no_hp" placeholder="" class="form-control" required="" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="password-input" class=" form-control-label">Foto</label>
						</div>
						<div class="col-12 col-md-9">
							<input type="file" id="password-input" name="fotoP" placeholder="" class="form-control" required="" >
						</div>
					</div>
					<input type="hidden" name="status" class="form-control" required="">
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection 