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
                        <h1>Pengajuan Proposal - <b>{{$data_agenda->kegiatan}}</b></h1>
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
                    <form action="/agenda-kegiatan/perencanaan/insert/{{$data_agenda->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-header"><strong>Pengajuan Proposal</strong><small> Insert</small></div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Kegaiatan</label>
                                        <input type="text" id="city" name="kegiatan" value="{{$data_agenda->kegiatan}}" class="form-control" disabled="">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Unit Kerja</label>
                                        <input type="text" id="city" name="unit" value="{{$data_agenda->unit}}" class="form-control" disabled="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Surat Pengantar</label>
                                <input type="file" id="vat" name="suratP" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="street" class="form-control-label">Proposal</label>
                                <input type="file" id="street" name="proposal" value="{{$data_agenda->proposal}}" class="form-control">
                            </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Keterangan</label>
                                            <textarea type="text" id="city" name="ket" class="form-control">{{$data_agenda->ket}}</textarea>
                                        </div>
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