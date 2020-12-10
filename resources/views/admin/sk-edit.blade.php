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
                        <h1>Surat Keterangan Ormawa </h1>
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
                    <form action="/sk/update/{{$data_sk->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="card-header"><strong>Surat Keterangan</strong><small> Update</small></div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Unit Kegiatan</label>
                                <input type="text" id="vat" name="unit" value="{{$data_sk->unit}}"  class="form-control" disabled="">
                            </div>
                            <div class="form-group"><label for="company" class=" form-control-label">Kegiatan</label>
                                <input type="text" id="company" name="kegiatan" value="{{$data_sk->kegiatan}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">File SK</label>
                                <input type="file" id="street" name="file_sk" class="form-control">
                                <a href="{{URL::to('/')}}/public/dokumen/{{$data_sk->file_sk }}">{{$data_sk->file_sk}}</a>
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">File SK</label>
                                <textarea name="notes" rows="3" class="form-control"></textarea>
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