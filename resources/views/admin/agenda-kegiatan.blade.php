@extends('base.adbase')
<title>Admin | FTIK Ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Program Kerja Ormawa FTIK</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="padding-top: 10px;">
                    <div class="page-title">
                        @if(auth()->user()->role_login == 'Ormawa')
                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#jadwal"><i class="fa fa-plus-square"></i> Tambah Program Kerja</a>
                        @else 
                        <!-- <null -->
                            @endif
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
                        <!-- <div class="col-md-12"> -->
                            <form class="col-sm-8" style="float: left;" action="" method="GET" role="search">
                                {{csrf_field()}}
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" name="search" placeholder="search....">
                                    <span class="input-group-btn">
                                      <span class="input-group-btn">
                                        <button class="btn btn-info" type="submit"> <i class="fa fa-search" style="font-size: 17px; padding: 3px; margin-right: 4px;"></i> </button>
                                    </span>
                                </span>
                            </div>
                        </form> 
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <!-- <h3>Jadwal Kegiatan</h3>
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
                                            @foreach ($data_agenda as $jadwal)
                                            <?php $no++;  ?>
                                            <tr class="text-center">
                                                <td>{{$no}}</td>
                                                <td>{{$jadwal->kegiatan}}</td>
                                                <td>{{$jadwal->unit}}</td>
                                                <td>{{$jadwal->tempat}}</td>
                                                <td>{{$jadwal->waktu}}</td>
                                                <td>
                                                    <!-- <h5 class="btn btn-danger btn-sm" style="font-size: 12px;">{{$jadwal->status}}</h5> -->
                                                    @if ($jadwal->status === 'Pengajuan Proposal')
                                                    <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Pengajuan Kaprodi')
                                                    <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Waiting')
                                                    <span style="background-color: yellow; padding: 2px 5px 2px 5px; border-radius: 5px; color: black; font-size: 12px;">{{$jadwal->status}}</span>
                                                    @elseif ($jadwal->status === 'Revisi KaProdi')
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
                                                <td>
                                                    @if(auth()->user()->role_login == 'Ormawa')
                                                    <a href="/agenda-kegiatan/{{$jadwal->id}}" class=" btn btn-success btn-sm"><i class="fa fa-check-square"></i></a>
                                                    <a href="/agenda-kegiatan/hapus/{{$jadwal->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
                                                    @endif

                                                    @if(auth()->user()->role_login == 'BEM')
                                                    <a href="/agenda-kegiatan/{{$jadwal->id}}" class=" btn btn-success btn-sm"><i class="fa fa-check-square"></i></a>
                                                    <a href="/agenda-kegiatan/hapus/{{$jadwal->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
                                                    @endif

                                                    @if(auth()->user()->role_login == 'BLM')
                                                    <a href="/agenda-kegiatan/{{$jadwal->id}}" class=" btn btn-success btn-sm"><i class="fa fa-check-square"></i></a>
                                                    <a href="/agenda-kegiatan/hapus/{{$jadwal->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
                                                    @endif
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

        <div class="modal fade" id="jadwal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="largeModalLabel"><b>Program Kerja TIK</b></h5>
                    </div>
                    <div class="modal-body">
                        <form action="/agenda-kegiatan/add" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password-input" class=" form-control-label">Kegiatan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="password-input" name="kegiatan" placeholder="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">Tempat</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="email-input" name="tempat" placeholder="" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password-input" class=" form-control-label">Waktu</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="password-input" name="waktu" placeholder="" class="form-control" required="">
                                </div>
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