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
                        <h1>Account Ormawa FTIK</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="page-header float-right" style="padding-top: 10px;">
                    <div class="page-title">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#register"><i class="fa fa-plus-square"></i> Tambah Account</button>
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
                        <strong class="card-title">Ormawa FTIK</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead style="background-color: #c81912; color: white;">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Ormawa</th>
                                    <th>Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_account as $akun)
                                <?php $no++;  ?>
                                <tr class="text-center">
                                    <td>{{$no}}</td>
                                    <td>{{$akun->nama_lengkap}}</td>
                                    <td>{{$akun->nim}}</td>
                                    <td>{{$akun->ormawa}}</td>
                                    <td>{{$akun->role_login}}</td>
                                    <td>
                                        <a href="/account/edit/{{$akun->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/account/hapus/{{$akun->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini.?')" ><i class="fa fa-trash"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Register Akses Account</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button> -->
  </div>
  <div class="modal-body">
    <form action="/postregister" method="post" >
        {{csrf_field()}}
        <div class="form-group">
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
      <div class="form-group">
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
  <div class="form-group">
    <label>Nama Lembaga</label>
    <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required="">
</div>
<div class="form-group">
    <label>Nim / Nidn</label>
    <input type="number" class="form-control" name="nim" placeholder="16416255201***" required="">
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="********" required="">
</div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
</div>
</div>
</div>

@endsection