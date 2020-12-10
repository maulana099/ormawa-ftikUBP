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
            <h1>Pengajuan SK  : <b>{{$data_sk->kegiatan}}</b></h1>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="page-header float-right">
          <div class="page-title">
            <h1>Status :<b>
              @if ($data_sk->status === 'Pengajuan SK')
              <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_sk->status}}</span>
              @elseif ($data_sk->status === 'Proses')
              <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: black;">{{$data_sk->status}}</span>
              @else ($data_sk->status === 'Selesai')
              <span style="background-color: #0c9463; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_sk->status}}</span>
            @endif </b></h1>
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
          <form action="/approved/sk/cek/{{$data_sk->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{csrf_field()}}
            <!-- <div class="card-header"><strong>Perencanaan</strong><small> Update</small></div> -->
            <div class="card-body card-block">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="password-input" class=" form-control-label">Nama Kegiatan</label>
                </div>
                <div class="col-12 col-md-9">
                 <p class="">{{$data_sk->kegiatan}}</p>
               </div>
             </div>
             <hr/>
             <div class="row form-group">
              <div class="col-12 col-md-3">
                <label for="password-input" class=" form-control-label">Unit Kerja Ormawa</label>
              </div>
              <div class="col-12 col-md-9">
               <p class="">{{$data_sk->unit}}</p>
             </div>
           </div>
           <hr/>
           <div class="row form-group">
            <div class="col-12 col-md-3">
              <label for="password-input" class=" form-control-label">Surat Keterangan</label>
            </div>
            <div class="col-12 col-md-7">
              <p>{{$data_sk->file_sk }}</p>
            </div>
            <div class="col-12 col-md-2">
             <a href="{{URL::to('/')}}/public/dokumen/{{$data_sk->file_sk}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
           </div>
         </div>
         <hr/>
        
        <div class="row form-group">
          <div class="col-12 col-md-3">
            <label for="password-input" class=" form-control-label">Approved</label>
          </div>
          <div class="col-12 col-md-4">
            <select id="status" name="status" class="custom-select custom-select-md">
              <option value="{{$data_sk->status}}">{{$data_sk->status}}</option>
              <option value="Proses">Proses</option>
              <option value="Selesai">Accepted</option>
            </select>
          </div>
          <div class="col-12 col-md-3">
            <input type="file" name="acc_sk" class="form-control">
          </div>
        </div>
        <hr/>
        <div class="row form-group">
          <div class="col-12 col-md-3">
            <label for="password-input" class=" form-control-label"> Notes</label>
          </div>
          <div class="col-12 col-md-9">
            <textarea class="form-control" name="notes" required="">{{$data_sk->notes}}</textarea>
          </div>
        </div>
        <hr/>
      </div>
      <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">SUBMIT</button>
    </form>
  </div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content -->

@endsection