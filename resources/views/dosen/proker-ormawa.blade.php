@extends('base.adbase')
<title>Admin | FTIK Ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Program Kerja Ormawa FTIK</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="GET">
                        {{csrf_field()}}
                        <div class="input-group custom-search-form col-md-2" style="float: left;">
                            <select name="filter" class="form-control">
                                <option value="">ORMAWA</option>
                                <option value="FTIK">FTIK</option>
                                <option value="HIMATIF">HIMATIF</option>
                                <option value="HIMASI">HIMASI</option>
                                <option value="HMTM">HMTM</option>
                                <option value="HMTI">HMTI</option>
                            </select>
                        </div>
                        <div class="input-group custom-search-form col-md-2" style="float: left;">
                            <select name="month" class="form-control">
                                <option value="">BULAN</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="input-group custom-search-form col-md-6" style="float: left;">
                            <input type="text" class="form-control" name="cari" placeholder="search....">
                        </div>
                        <button type="submit" class="btn btn-info btn-sm">SUBMIT <i class="fa fa-filter" style="padding: 5px;"></i>
                        </button>
                    </form> 
                </div>

                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <!-- <h3>proker Kegiatan</h3>
                                <br/> -->
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead style="background-color:  #34495E; color: white;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Kegiatan</th>
                                                <th>Unit Kerja</th>
                                                <th>Tempat</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach ($data_proker as $proker)
                                            <?php $no++;  ?>
                                            <tr class="text-center">
                                                <td>{{$no}}</td>
                                                <td>{{$proker->kegiatan}}</td>
                                                <td>{{$proker->unit}}</td>
                                                <td>{{$proker->tempat}}</td>
                                                <td>{{$proker->waktu}}</td>
                                                <td>
                                                    <!-- <h5 class="btn btn-danger btn-sm" style="font-size: 12px;">{{$proker->status}}</h5> -->
                                                    @if ($proker->status === 'Pengajuan Proposal')
                                                    <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Pengajuan Kaprodi')
                                                    <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Waiting')
                                                    <span style="background-color: yellow; padding: 2px 5px 2px 5px; border-radius: 5px; color: black; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Revisi KaProdi')
                                                    <span style="background-color: #d9455f; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Pengajuan Dekan')
                                                    <span style="background-color: #1f4068; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Revisi Dekan')
                                                    <span style="background-color: #b5076b; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Proses Pelaksanaan')
                                                    <span style="background-color: #00a1ab; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Pengajuan LPJ')
                                                    <span style="background-color: #f5a31a; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'TTD Dekan')
                                                    <span style="background-color: #f6d743; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @elseif ($proker->status === 'Selesai')
                                                    <span style="background-color: #0c9463; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @else
                                                    <span style="background-color: #dc3545; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$proker->status}}</span>
                                                    @endif
                                                </td>
                                                <td>                                                  
                                                    <a href="/approved/proker/{{$proker->id}}" class=" btn btn-info btn-sm"><i class="fa fa-check-square"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .content -->

        <div class="modal fade" id="proker" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="largeModalLabel"><b>Agenda Kegiatan FTIK</b></h5>
                    </div>
                    <div class="modal-body">
                        <form action="/proker/add" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="password-input" class=" form-control-label">Kegiatan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="password-input" name="kegiatan" placeholder="" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Unit Kerja</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select id="unit" name="unit" class="form-control">
                                        <option>------------</option>
                                        <option value="BEM FTIK">BEM FTIK</option>
                                        <option value="BLM FTIK">BLM FTIK</option>
                                        <option value="HIMATIF">HIMATIF</option>
                                        <option value="HMTI">HMTI</option>
                                        <option value="HIMASI">HIMASI</option>
                                        <option value="HMTM">HMTM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tempat</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="email-input" name="tempat" placeholder="" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="password-input" class=" form-control-label">Waktu</label></div>
                                <div class="col-12 col-md-9"><input type="date" id="password-input" name="waktu" placeholder="" class="form-control"></div>
                            </div>
                            <input type="hidden" name="status" class="form-control" value="">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection