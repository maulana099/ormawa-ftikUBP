@extends('base.adbase')
<title>Admin | FTIK Ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Agenda Kegiatan Ormawa FTIK</h1>
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
                    <!-- <div class="col-md-12"> -->
                        <!-- <form class="col-sm-8" style="float: left;" action="" method="GET" role="search">
                            {{csrf_field()}}
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="cari" placeholder="search....">
                                <span class="input-group-btn">
                                  <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit"> <i class="fa fa-search" style="font-size: 17px; padding: 3px; margin-right: 4px;"></i> </button>
                                </span>
                            </span>
                        </div>
                    </form>  -->
                    <!-- <form class="form-inline col-sm-4" style="float: left;" action="" method="GET" id="bln">
                        {{csrf_field()}}
                      <div class="input-group custom-search-form">
                        <select name="month" class="form-control" form="bln">
                            <option value="01">Januari</option>
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
                    <button type="submit" class="btn btn-info"><i class="fa fa-filter" style="font-size: 17px; padding: 3px;"></i> </button>    
                </form> -->
                <!-- </div> -->
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <!-- <h3>Jadwal Kegiatan</h3>
                                <br/> -->
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead style="background-color:  #0f4c81; color: white;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Kegiatan</th>
                                                <th>Unit Kerja</th>
                                                <th>Tempat</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach ($data_task as $jadwal)
                                            <?php $no++;  ?>
                                            <tr class="text-center">
                                                <td>{{$no}}</td>
                                                <td>{{$jadwal->kegiatan}}</td>
                                                <td>{{$jadwal->unit}}</td>
                                                <td>{{$jadwal->tempat}}</td>
                                                <td>{{ date('d F Y',strtotime($jadwal->waktu)) }}</td>
                                                <td>
                                                    @if ($jadwal->status === 'Pengajuan Proposal')
                                                    <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Pengajuan Kaprodi')
                                                    <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Waiting')
                                                    <span style="background-color: yellow; padding: 2px 5px 2px 5px; border-radius: 5px; color: black; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Revisi Kaprodi')
                                                    <span style="background-color: #d9455f; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Pengajuan Dekan')
                                                    <span style="background-color: #1f4068; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Revisi Dekan')
                                                    <span style="background-color: #b5076b; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Proses Pelaksanaan')
                                                    <span style="background-color: #00a1ab; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Pengajuan LPJ')
                                                    <span style="background-color: #f5a31a; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'TTD Dekan')
                                                    <span style="background-color: #f6d743; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Selesai')
                                                    <span style="background-color: #0c9463; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @else
                                                    <span style="background-color: #dc3545; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $data_task->links()}}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .content -->


    </div>
    @endsection