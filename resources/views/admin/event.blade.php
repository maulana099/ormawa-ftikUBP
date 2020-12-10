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
                        <h1>Event Ormawa FTIK</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="page-header float-right" style="padding-top: 10px;">
                    <div class="page-title">
                     @if(auth()->user()->role_login == 'Ormawa')
                     <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#event"><i class="fa fa-plus-square"> Tambah</i>
                     </button>
                     @else
                     <!-- null -->
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
                            <thead style="background-color: #413c69; color: white;">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Event</th>
                                    <th>Unit</th>
                                    <th>File Event</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_event as $event)
                                <?php $no++;  ?>
                                <tr class="text-center">
                                    <td>{{$no}}</td>
                                    <td>{{$event->nama_event}}</td>
                                    <td>{{$event->unit}}</td>
                                    <td>
                                        <a href="{{URL::to('/')}}/public/gambar/{{$event->file_event}}" target="_blank">
                                            <img src="{{URL::to('/')}}/public/gambar/{{$event->file_event}}" class="img-thumbnail" width="50"></a>
                                        </td>
                                        <td>
                                            @if(auth()->user()->role_login == 'Ormawa')
                                            <a href="/unduhan/event/{{$event->id}}/editdok" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="/event/hapus/{{$event->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
                                            @else
                                            <a href="/event" class="btn-danger btn-sm btn"><i class="fa fa-exclamation-circle"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$data_event->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="largeModalLabel"><b>Event Ormawa FTIK</b></h5>
                </div>
                <div class="modal-body">
                    <form action="/event/tambah" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password-input" class=" form-control-label">Nama Event</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="password-input" name="nama_event" placeholder="" class="form-control" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="password-input" class=" form-control-label">File Event</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="password-input" name="file_event[]" multiple="" class="form-control" required="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" style="float: right;">Save</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection