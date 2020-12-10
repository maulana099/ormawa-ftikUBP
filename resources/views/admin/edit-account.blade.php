@extends('base.adbase')
<title>Admin | FTIK.ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Account - <b>{{$data_register->nama_lengkap}}</b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="/account/update/{{$data_register->id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card-header"><strong>Update Account</strong><small> FTIK</small></div>
                        <div class="card-body card-block">
                            <div class="col-lg-6" style="float: left;">
                                <div class="row form-group">
                                    <label>Your Access</label>
                                    <select id="cars" class="form-control" required="" name="role_login">
                                      <option>SELECTED</option>
                                      <option selected="Ormawa">Ormawa</option>
                                      <option value="DPM">DPM</option>
                                      <option value="KaProdi">KaProdi</option>
                                      <option value="Dekanat">Dekanat</option>
                                      <option value="TU">Tata Usaha</option>
                                      <option value="Master">Master</option>
                                  </select>
                              </div>
                              <div class="row form-group">
                                <label>Organisasi</label>
                                <select id="cars" class="form-control" required="" name="ormawa">
                                  <option >SELECTED</option>
                                  <option selected="FTIK">FTIK</option>
                                  <option value="HIMATIF">HIMATIF</option>
                                  <option value="HMTI">HMTI</option>
                                  <option value="HIMASI">HIMASI</option>
                                  <option value="HMTM">HMTM</option>
                              </select>
                          </div>
                          <div class="row form-group">
                            <label>Nama Lembaga</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="{{$data_register->nama_lengkap}}">
                        </div>
                        <div class="row form-group">
                            <label>Nim / Nidn</label>
                            <input type="number" class="form-control" name="nim" placeholder="16416255201***" value="{{$data_register->nim}}">
                        </div>
                        <div class="row form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="********" value="{{$data_register->password}}">
                        </div>
                        <hr/>
                    <button class="btn btn-primary" type="submit" style="float: right;">UPDATE DATA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- .animated -->
</div><!-- .content -->

@endsection