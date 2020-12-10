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
                        <h1>Agenda Kegiatan - Dokumen</h1>
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
                    <form action="/dokumen/update/{{$data_dokumen->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-header"><strong>Dokumen</strong><small> Update</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="company" class=" form-control-label">Nama Dokumen</label>
                                <input type="text" id="company" name="nama_file" value="{{$data_dokumen->nama_file}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Unit Kegiatan</label>
                                <input type="text" id="vat" name="unit" value="{{$data_dokumen->unit}}"  class="form-control" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">File Dokumen</label>
                                <input type="file" id="street" name="file_dokumen" class="form-control">
                                <a href="{{URL::to('/')}}/public/dokumen/{{$data_dokumen->file_dokumen }}">{{$data_dokumen->file_dokumen}}</a>
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