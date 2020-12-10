@extends('base.adbase')
<title>Admin | Ormawa FTIK</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DOKUMENTASI KEGIATAN ORMAWA {{auth()->user()->ormawa}}</h1>
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
                                    <th>Unit</th>
                                    <th>Nama Kegiatan</th>
                                    <th>File Dokumentasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_dokumentasi as $gambar)
                                <?php $no++;  ?>
                                <tr class="text-center">
                                    <td>{{$no}}</td>
                                    <td>{{$gambar->unit}}</td>
                                    <td>{{$gambar->nama_kegiatan}}</td>
                                    <td>
                                        <a href="{{URL::to('/')}}/public/dokumentasi/{{$gambar->file_gambar}}" target="_blank">
                                            <img src="{{URL::to('/')}}/public/dokumentasi/{{$gambar->file_gambar}}" class="img-thumbnail" width="50">
                                        </a>
                                    </td>
                                    <td>
                                        @if(auth()->user()->role_login == 'Ormawa')
                                        <a href="/dokumentasi/edit/{{$gambar->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="/dokumentasi/hapus/{{$gambar->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
                                        @else
                                        <a href="/dokumentasi" class="btn-danger btn-sm btn"><i class="fa fa-exclamation-circle"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data_dokumentasi->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection