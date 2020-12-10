@extends('base.adbase')
<title>Admin | FTIK.ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DOKUMENTASI KEGIATAN ORMAWA FTK</h1>
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
                    <form action="/dokumentasi/update/{{$data_dokumentasi->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="card-header"><strong>Dokumen</strong><small> Update</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="company" class=" form-control-label">Nama Kegiatan</label>
                                <input type="text" id="company" name="nama_kegiatan" disabled="" value="{{$data_dokumentasi->nama_kegiatan}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">File Dokumentasi</label>
                                <input type="file" id="street" name="file_gambar" class="form-control">
                                <a href="{{URL::to('/')}}/public/dokumentasi/{{$data_dokumentasi->file_gambar }}">{{$data_dokumentasi->file_gambar}}</a>
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Keterangan</label>
                                <textarea type="text" id="vat" name="keterangan" value="{{$data_dokumentasi->keterangan}}"  class="form-control">{{$data_dokumentasi->keterangan}}</textarea> 
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" style="float: right;">Edit Dokumen</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection