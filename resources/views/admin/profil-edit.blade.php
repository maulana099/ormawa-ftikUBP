@extends('base.adbase')
<title>Admin | FTIK.ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>STURKTURAL BEM FTIK </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <form action="/profil/update/{{$data_profil->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="card-header"><strong>Sturuktural BEM FTIK</strong><small> Update</small></div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Nama</label>
                                <input type="text" id="vat" name="nama" value="{{$data_profil->nama}}"  class="form-control">
                            </div>
                            <div class="form-group"><label for="company" class=" form-control-label">Jabatan</label>
                                <input type="text" id="company" name="jabatan" value="{{$data_profil->jabatan}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">NIM</label>
                                <input type="text" id="vat" name="nim" value="{{$data_profil->nim}}"  class="form-control">
                            </div>
                            <div class="form-group"><label for="company" class=" form-control-label">No HP</label>
                                <input type="text" id="company" name="no_hp" value="{{$data_profil->no_hp}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">Foto</label>
                                <input type="file" id="street" name="fotoP" class="form-control">
                                <a href="{{URL::to('/')}}/public/gambar/{{$data_profil->fotoP }}">{{$data_profil->fotoP}}</a>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm" type="submit" style="float: right; margin-right: 20px;"> UPDATE SK</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection