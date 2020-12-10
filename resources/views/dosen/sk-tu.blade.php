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
                        <h1>Surat Keterangan Ormawa FTIK</h1>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-6">
                <div class="page-header float-right" style="padding-top: 10px;">
                    <div class="page-title">
                        @if(auth()->user()->role_login == 'Ormawa')
                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#sk"><i class="fa fa-plus-square"></i> Tambah Program Kerja</a>
                        @endif

                        @if(auth()->user()->role_login == 'BEM')
                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#sk"><i class="fa fa-plus-square"></i> Tambah Program Kerja</a>
                        @endif

                        @if(auth()->user()->role_login == 'BLM')
                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#sk"><i class="fa fa-plus-square"></i> Tambah Program Kerja</a>
                        @endif
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<div class="content">


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card-header">
                             <form action="" method="GET" role="filter">
                                {{csrf_field()}}
                                @if(auth()->user()->ormawa == 'FTIK')
                                <div class="input-group custom-search-form col-md-3" style="float: left;">
                                    <select name="filter" class="form-control">
                                        <option value="">SELECTED</option>
                                        <option value="FTIK">FTIK</option>
                                        <option value="HIMATIF">HIMATIF</option>
                                        <option value="HIMASI">HIMASI</option>
                                        <option value="HMTM">HMTM</option>
                                        <option value="HMTI">HMTI</option>
                                    </select>
                                </div>
                                @endif
                                <div class="input-group custom-search-form col-md-7" style="float: left;">
                                    <input type="text" class="form-control" name="search" placeholder="search....">
                                </div>
                                <button type="submit" class="btn btn-info btn-sm">SUBMIT <i class="fa fa-filter" style="padding: 5px;"></i>
                                </button>
                            </form> 
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead style="background-color:  #34495E; color: white;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kegiatan</th>
                                        <th>Unit Kerja</th>
                                        <th>file SK</th>
                                        <th>Acc SK</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($data_sk as $sk)
                                    <?php $no++;  ?>
                                    <tr class="text-center">
                                        <td>{{$no}}</td>
                                        <td>{{$sk->kegiatan}}</td>
                                        <td>{{$sk->unit}}</td>
                                        <td>{{$sk->file_sk}}</td>
                                        @if($sk->status == 'Selesai')
                                        <td>
                                            <a href="{{URL::to('/')}}/public/dokumen/{{$sk->acc_sk}}" target="_blank"><i class="ti-download" style="color: blue;"></i></a>
                                        </td>
                                        @else
                                        <td>
                                            <i class="fa fa-question-circle"></i>
                                        </td>
                                        @endif
                                        <td>
                                            @if ($sk->status === 'Pengajuan SK')
                                            <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$sk->status}}</span>
                                            @elseif ($sk->status === 'Proses')
                                            <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$sk->status}}</span>
                                            @else ($sk->status === 'Selesai')
                                            <span style="background-color: green; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$sk->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(auth()->user()->role_login == 'TU')
                                            <a href="/approved/sk/{{$sk->id}}" class=" btn btn-info btn-sm"><i class="fa fa-check-square"></i></a>
                                            @else
                                            <a href="/ormawa-ftik" class="btn-danger btn-sm btn"><i class="fa fa-exclamation-circle"></i></a>
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

</div>
@endsection