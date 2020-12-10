@extends('base.adbase')
<title>Admin | FTIK.ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Surat Keterangan {{auth()->user()->nama_lengkap}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="padding-top: 10px;">
                    <div class="page-title">
                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#sk"><i class="fa fa-plus-square"> Tambah SK</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
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
                            <thead style="background-color: #c81912; color: white;">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Unit</th>
                                    <th>File SK</th>
                                    <th>Status</th>
                                    <th>Acc SK</th>
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
                                    <td>
                                        <a href="{{URL::to('/')}}/public/dokumen/{{$sk->file_sk}}" target="_blank">{{$sk->file_sk}}</a>
                                    </td>
                                    <td>
                                     @if ($sk->status === 'Pengajuan SK')
                                     <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$sk->status}}</span>
                                     @elseif ($sk->status === 'Proses')
                                     <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$sk->status}}</span>
                                     @elseif ($sk->status === 'Selesai')
                                     <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$sk->status}}</span>
                                     @endif
                                 </td>
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
                                    <a href="/cek/sk/{{$sk->id}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    <a href="/sk/edit/{{$sk->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="/sk/hapus/{{$sk->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
</div><!-- .content -->

<div class="modal fade" id="sk" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="largeModalLabel"><b>Surat Keterangan</b></h5>
            </div>
            <div class="modal-body">
                <form action="/sk/upload" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                            <label for="email-input" class=" form-control-label">File SK</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="email-input" name="file_sk" placeholder="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="email-input" class=" form-control-label">Notes</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="notes" class="form-control" required=""></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection