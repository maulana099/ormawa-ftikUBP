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
                        <h1>Laporan PJ - <b>{{$data_agenda->kegiatan}}</b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="/agenda-kegiatan/lpj/insert/{{$data_agenda->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-header"><strong>Laporan PJ</strong><small> Insert</small></div>
                        <div class="card-body card-block">
                            <div class="col-lg-6" style="float: left;">
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
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Surat Pengantar</label>
                                            <input type="text" id="city" name="suratP" value="{{$data_agenda->suratP}}" class="form-control" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Proposal</label>
                                            <input type="text" id="city" name="proposal" value="{{$data_agenda->proposal}}" class="form-control" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6" style="float: right;">   
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Berita Acara</label>
                                            <input type="file" id="city" name="berita_acara" value="{{$data_agenda->berita_acara}}" class="form-control">
                                            <a href="{{URL::to('/')}}/public/dokumen/{{ $data_agenda->berita_acara }}">{{$data_agenda->berita_acara}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Laporan Pertanggung Jawaban</label>
                                            <input type="file" id="city" name="lpj" value="{{$data_agenda->lpj}}" class="form-control">
                                            <a href="{{URL::to('/')}}/public/dokumen/{{ $data_agenda->lpj }}">{{$data_agenda->lpj}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Keterangan</label>
                                            <textarea type="text" id="city" name="keterangan" class="form-control" rows="5">{{$data_agenda->keterangan}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" style="float: right; margin-right: 20px; margin-bottom: 20px;">SAVE DATA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    @endsection