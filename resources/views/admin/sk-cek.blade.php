@extends('base.adbase')
<title>Admin | FTIK.ormawa</title>
@section('content')
<!-- Header-->

<div class="breadcrumbs" >
  <div class="breadcrumbs-inner" style="background-color: teal;">
    <div class="row m-0">
      <div class="col-sm-6">
        <div class="page-header float-left" style="background-color: teal; color: white;">
          <div class="page-title">
            <h1>Agenda Kegiatan  : <b>{{$data_sk->kegiatan}}</b></h1>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="page-header float-right" style="background-color: teal; color: white;">
          <div class="page-title">
            <h1>Status :<b>
              @if ($data_sk->status === 'Pengajuan SK')
              <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_sk->status}}</span>
              @elseif ($data_sk->status === 'Proses')
              <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_sk->status}}</span>
              @elseif ($data_sk->status === 'Selesai')
              <span style="background-color: #0c9463; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_sk->status}}</span>
              @else
              <span style="background-color: #dc3545; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_sk->status}}</span>
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
          <form action="/agenda-kegiatan/approved/{{$data_sk->id}}/proker" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- <div class="card-header"><strong>Perencanaan</strong><small> Update</small></div> -->
            <div class="card-body card-block">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="password-input" class=" form-control-label">Nama Kegiatan</label>
                </div>
                <input type="hidden" name="kegiatan" class="form-control" value="{{$data_sk->kegiatan}}">
                <div class="col-12 col-md-9">
                 <p class="">{{$data_sk->kegiatan}}</p>
               </div>
             </div>
             <hr/>
             <div class="row form-group">
              <div class="col-12 col-md-3">
                <label for="password-input" class=" form-control-label">Unit Kerja Ormawa</label>
              </div>
              <input type="hidden" name="unit" class="form-control" value="{{$data_sk->unit}}">
              <div class="col-12 col-md-9">
               <p class="">{{$data_sk->unit}}</p>
             </div>
           </div>
           <hr/>
           <div class="row form-group">
            <div class="col-12 col-md-3">
              <label for="password-input" class=" form-control-label">Surat Pengantar Proposal</label>
            </div>
            <input type="hidden" name="file_sk" class="form-control" value="{{$data_sk->file_sk}}">
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
            <label for="password-input" class=" form-control-label">Catatan</label>
          </div>
          <input type="hidden" name="notes" class="form-control" value="{{$data_sk->notes}}">
          <div class="col-12 col-md-9">
           <p class="">{{$data_sk->notes}}</p>
         </div>
       </div>
     </div>
   </form>
 </div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content -->


@endsection