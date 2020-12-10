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
                        <h1>Format Administrasi Ormawa FTIK</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="padding-top: 10px;">
                    <div class="page-title">
                        @if(auth()->user()->role_login == 'Ormawa')
                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#dokumen"><i class="fa fa-plus-square"> Dokument</i>
                        </button>
                        @else
                        @endif
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
                                    <th>Nama Dokumen</th>
                                    <th>Unit</th>
                                    <th>File Dokument</th>
                                    <th>Unduhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_dokumen as $dok)
                                <?php $no++;  ?>
                                <tr class="text-center">
                                    <td>{{$no}}</td>
                                    <td>{{$dok->nama_file}}</td>
                                    <td>{{$dok->unit}}</td>
                                    <td>
                                        <a href="{{URL::to('/')}}/public/dokumen/{{$dok->file_dokumen}}" target="_blank">{{$dok->file_dokumen}}</a>
                                    </td>
                                    <td>
                                        <a href="{{URL::to('/')}}/public/dokumen/{{$dok->file_dokumen}}" target="_blank"><i class="ti-download" style="color: blue;"></i></a>
                                    </td>
                                    <td>
                                        @if(auth()->user()->role_login == 'Ormawa')
                                        <a href="/dokumen/edit/{{$dok->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/dokumen/hapus/{{$dok->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
                                        @else
                                        <a href="/dokumen" class="btn-danger btn-sm btn"><i class="fa fa-exclamation-circle"></i></a>
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
    </div><!-- .animated -->
</div><!-- .content -->

<div class="modal fade" id="dokumen" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="largeModalLabel"><b>Format Administrasi FTIK</b></h5>
            </div>
            <div class="modal-body">
                <form action="/dokumen/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="password-input" class=" form-control-label">Nama Dokumen</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="password-input" name="nama_file" placeholder="" class="form-control" required=""></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">File Dokumen</label>
                                </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="email-input" name="file_dokumen[]" multiple="" placeholder="" class="form-control" required="">
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