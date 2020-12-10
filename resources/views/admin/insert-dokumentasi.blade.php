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
                        <h1>Dokumentasi Kegiatan <b>{{$data_proker->kegiatan}}</b></h1>
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
                    <form action="/tambah/dokumentasi/add/{{$data_proker->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-header"></div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password-input" class=" form-control-label">Keterangan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="password-input" name="keterangan" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password-input" class=" form-control-label">Dokumentasi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="password-input" name="file_gambar[]" multiple="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" style="float: right; margin-right: 20px;">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection