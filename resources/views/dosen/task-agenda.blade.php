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
                    <!-- <h4>Centered Tabs and Pills</h4> -->
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach ($data_agenda as $jadwal)
                                            <?php $no++;  ?>
                                            <tr class="text-center">
                                                <td>{{$no}}</td>
                                                <td>{{$jadwal->kegiatan}}</td>
                                                <td>{{$jadwal->unit}}</td>
                                                <td>{{$jadwal->tempat}}</td>
                                                <td>{{$jadwal->waktu}}</td>
                                                <td>
                                                    @if ($jadwal->status === 'Pengajuan Proposal')
                                                    <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Accepted')
                                                    <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$jadwal->status}}</span>
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