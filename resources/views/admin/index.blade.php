@extends('base.adbase')
<title>Admin | FTIK.ormawa</title>
@section('content')
<!-- Header-->
<!-- /#header -->
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count">{{$profil['profil_count']->count}}</span>
                            </h3>
                            <p class="text-light mt-1 m-0">Anggota BEM FTIK</p>
                        </div><!-- /.card-left -->

                        <div class="card-right float-right text-right">
                            <i class="icon fade-5 icon-lg pe-7s-users"></i>
                        </div><!-- /.card-right -->

                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count">{{$proker_count}}</span>
                            </h3>
                            <p class="text-light mt-1 m-0">Program Kerja</p>
                        </div><!-- /.card-left -->

                        <div class="card-right float-right text-right">
                            <i class="icon fade-5 icon-lg pe-7s-news-paper"></i>
                        </div><!-- /.card-right -->

                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-6">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count">{{$sk['sk_count']->count}}</span>
                                <!-- <span>%</span> -->
                            </h3>
                            <p class="text-light mt-1 m-0">Surat Keterangan</p>
                        </div><!-- /.card-left -->

                        <div class="card-right float-right text-right">
                            <i class="icon fade-5 icon-lg pe-7s-add-user"></i>
                        </div><!-- /.card-right -->

                    </div>

                </div>
            </div>


            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body">
                        <div class="card-left pt-1 float-left">
                            <h3 class="mb-0 fw-r">
                                <span class="count">0</span>
                            </h3>
                            <p class="text-light mt-1 m-0">-</p>
                        </div><!-- /.card-left -->

                        <div class="card-right float-right text-right">
                            <i class="icon fade-5 icon-lg pe-7s-add-user"></i>
                        </div><!-- /.card-right -->

                    </div>

                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!-- Calender Chart Weather  -->
        <div class="row">
            <!-- <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Kegiatan Harian BEM FTIK UBP Karawang</h4>
                        <div class="calender-cont widget-calender">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div> -->

                    <!-- <div class="col-lg-4 col-md-6">
                        <div class="card ov-h">
                            <div class="card-body bg-flat-color-2">
                                <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                            </div>
                            <div id="cellPaiChart" class="float-chart"></div>
                        </div>
                    </div> -->
                    
                </div>
                <!-- /Calender Chart Weather -->

                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Anggota BEM</h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">No</th>
                                                    <th class="avatar">Foto</th>
                                                    <th>Nim</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            @foreach ($data_profil as $profil)
                                            <tbody>
                                                <tr class=" pb-0">
                                                    <td class="serial">1.</td>
                                                    <td class="avatar pb-0">
                                                        <div class="round-img">
                                                            <a href="{{URL::to('/')}}/public/gambar/{{$profil->fotoP}}">
                                                                <img class="rounded-circle" src="{{URL::to('/')}}/public/gambar/{{$profil->fotoP }}" alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td> {{$profil->nim}} </td>
                                                    <td> <span class="name">{{$profil->nama}}</span> </td>
                                                    <td> <span class="product">{{$profil->jabatan}}</span> </td>
                                                    <td>
                                                        @if ($profil->status === 'active')
                                                        <span style="background-color: #27AE60; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$profil->status}}</span>
                                                        @else
                                                        <span style="background-color: #FF3333; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$profil->status}}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div> <!-- /.table-stats -->
                                    {{$data_profil->links()}}
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card br-0">
                                        <div class="card-body">
                                            <div class="chart-container ov-h">
                                                <div id="flotPie1" class="float-chart"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.card -->
                                </div>
                            </div>
                        </div> <!-- /.col-md-4 -->
                    </div>
                </div>
                <!-- /.orders -->
                
                <!-- Modal - Calendar - Add New Event -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#event-modal -->
                <!-- Modal - Calendar - Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add a category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form action="/add/calender" method="POST">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="nama"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="status">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->

        @endsection