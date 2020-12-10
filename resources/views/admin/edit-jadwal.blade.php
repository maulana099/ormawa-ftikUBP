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
                        <h1>Agenda Kegiatan - Jadwal</h1>
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
                    <form action="/agenda-kegiatan/update/{{$data_agenda->id}}" method="POST" enctype="multypart/form-data">
                        {{csrf_field()}}
                        <div class="card-header"><strong>Jadwal</strong><small> Edit</small></div>
                        <div class="card-body card-block">
                            <div class="form-group"><label for="company" class=" form-control-label">Kegiatan</label>
                                <input type="text" id="company" name="kegiatan" value="{{$data_agenda->kegiatan}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="unit" class=" form-control-label">Unit Kerja</label>
                                <input type="text" id="vat" name="unit" value="{{$data_agenda->unit}}"  class="form-control" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">tempat</label>
                                <input type="text" id="street" name="tempat" value="{{$data_agenda->tempat}}" class="form-control">
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Waktu</label>
                                        <input type="date" id="city" name="waktu" value="{{$data_agenda->waktu}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" style="float: right; margin-right: 20px;">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection