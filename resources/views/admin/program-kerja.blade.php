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
            <h1>Agenda Kegiatan  : <b>{{$data_proker->kegiatan}}</b></h1>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="page-header float-right" style="background-color: teal; color: white;">
          <div class="page-title">
            <h1>Status :<b>
              @if ($data_proker->status === 'Pengajuan Proposal')
              <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Pengajuan Kaprodi')
              <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Revisi KaProdi')
              <span style="background-color: #d9455f; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Pengajuan Dekan')
              <span style="background-color: #1f4068; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Revisi Dekan')
              <span style="background-color: #b5076b; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Proses Pelaksanaan')
              <span style="background-color: #00a1ab; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Pengajuan LPJ')
              <span style="background-color: #f5a31a; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'TTD Dekan')
              <span style="background-color: #f6d743; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Selesai')
              <span style="background-color: #0c9463; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @else
              <span style="background-color: #dc3545; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
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
          <form action="" method="" enctype="multipart/form-data">
            <!-- <div class="card-header"><strong>Perencanaan</strong><small> Update</small></div> -->
            <div class="card-body card-block">
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="password-input" class=" form-control-label">Nama Kegiatan</label>
                </div>
                <input type="hidden" name="kegiatan" class="form-control" value="{{$data_proker->kegiatan}}">
                <div class="col-12 col-md-9">
                 <p class="">{{$data_proker->kegiatan}}</p>
               </div>
             </div>
             <hr/>
             <div class="row form-group">
              <div class="col-12 col-md-3">
                <label for="password-input" class=" form-control-label">Unit Kerja Ormawa</label>
              </div>
              <input type="hidden" name="unit" class="form-control" value="{{$data_proker->unit}}">
              <div class="col-12 col-md-9">
               <p class="">{{$data_proker->unit}}</p>
             </div>
           </div>
           <hr/>
           <div class="row form-group">
            <div class="col col-md-3">
              <label for="password-input" class=" form-control-label">Lokasi Kegiatan</label>
            </div>
            <input type="hidden" name="tempat" class="form-control" value="{{$data_proker->tempat}}">
            <div class="col-12 col-md-9">
             <p class="">{{$data_proker->tempat}}</p>
           </div>
         </div>
         <hr/>
         <div class="row form-group">
          <div class="col-12 col-md-3">
            <label for="password-input" class=" form-control-label">Waktu Kegiatan</label>
          </div>
          <input type="hidden" name="waktu" class="form-control" value="{{$data_proker->waktu}}">
          <div class="col-12 col-md-9">
           <p class="">{{$data_proker->waktu}}</p>
         </div>
       </div>
       <a href="/agenda-kegiatan/edit/{{$data_proker->id}}" class="btn btn-primary btn-sm">Edit Kegiatan <i class="fa fa-edit"></i></a>
     </div>
   </form>
 </div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content -->



<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <form action="/agenda-kegiatan/approved/{{$data_proker->id}}/proker" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-header">Pengajuan Proposal : <b>{{$data_proker->kegiatan}}</b>
              @if($data_proker->status == 'Belum Terlaksana')
              <a href="/agenda-kegiatan/perencanaan/{{$data_proker->id}}" class="btn btn-success btn-sm">Ajukan Proposal</a>
              @else
              <!-- null -->
              @endif
            </div>
            <div class="card-body card-block">
              @if($data_proker->status == 'Belum Terlaksana')
              <h3>Anda Belum Mengajukan Proposal</h3>
              @else
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Surat Pengantar Proposal</label>
                </div>
                <input type="hidden" name="suratP" class="form-control" value="{{$data_proker->suratP}}">
                <div class="col-12 col-md-7">
                  <p>{{$data_proker->suratP }}</p>
                </div>
                <div class="col-12 col-md-2">
                 <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->suratP}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
               </div>
             </div>
             <hr/>
             <div class="row form-group">
              <div class="col-5 col-md-3">
                <label for="password-input" class=" form-control-label">Proposal Kegiatan</label>
              </div>
              <input type="hidden" name="proposal" class="form-control" value="{{$data_proker->proposal}}">
              <div class="col-5 col-md-7">
                <p>{{$data_proker->proposal}}</p>
              </div>
              <div class="col-2 col-md-2">
                <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->proposal}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
              </div>
            </div>
            <hr/>
            <div class="row form-group">
              <div class="col-12 col-md-3">
                <label for="password-input" class=" form-control-label">Deskripsi</label>
              </div>
              <input type="hidden" name="ket" class="form-control" value="{{$data_proker->ket}}">
              <div class="col-12 col-md-9">
               <p class="">{{$data_proker->ket}}</p>
             </div>
           </div>
           @if ($data_proker->status === 'Revisi KaProdi')
           <a href="/agenda-kegiatan/pengajuan/{{$data_proker->id}}" class="btn btn-danger btn-sm">Pengajuan Kembali <i class="fa fa-exclamation"></i></a>
           @elseif ($data_proker->status === 'Revisi Dekan')
           <a href="/agenda-kegiatan/pengajuan/{{$data_proker->id}}" class="btn btn-danger btn-sm">Pengajuan Kembali <i class="fa fa-exclamation"></i></a>
           @endif
           <a href="/agenda-kegiatan/perencanaan/edit/{{$data_proker->id}}" class="btn btn-primary btn-sm">Edit Proposal <i class="fa fa-edit"></i></a>
           @endif
         </div>
       </form>
     </div>
   </div>
 </div>
</div><!-- .animated -->
</div><!-- .content -->

<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card-header">Laporan Pertanggung Jawaban : <b>{{$data_proker->kegiatan}}</b>
              @if($data_proker->status == 'Proses Pelaksanaan')
              <a href="/agenda-kegiatan/lpj/{{$data_proker->id}}" class="btn btn-success btn-sm">Ajukan LPJ
              </a>
              @endif
            </div>
            <div class="card-body card-block">
              @if($data_proker->status == 'Pengajuan LPJ')
              <div class="row form-group">
                <div class="col-5 col-md-3">
                  <label for="password-input" class=" form-control-label">Berita Acara</label>
                </div>
                <input type="hidden" name="berita_acara" class="form-control" value="{{$data_proker->berita_acara}}">
                <div class="col-5 col-md-7">
                  <p>{{$data_proker->berita_acara}}</p>
                </div>
                <div class="col-2 col-md-2">
                  <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->berita_acara}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
                </div>
              </div>
              <hr/>
              <div class="row form-group">
                <div class="col-5 col-md-3">
                  <label for="password-input" class=" form-control-label">LPJ Kegiatan</label>
                </div>
                <input type="hidden" name="lpj" class="form-control" value="{{$data_proker->lpj}}">
                <div class="col-5 col-md-7">
                  <p>{{$data_proker->lpj}}</p>
                </div>
                <div class="col-2 col-md-2">
                  <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->lpj}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
                </div>
              </div>
              <hr/>
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Deskripsi</label>
                </div>
                <input type="hidden" name="waktu" class="form-control" value="{{$data_proker->keterangan}}" required="">
                <div class="col-12 col-md-9">
                 <p class="">{{$data_proker->keterangan}}</p>
               </div>
             </div>
             <a href="/agenda-kegiatan/lpj/edit/{{$data_proker->id}}" class="btn btn-primary btn-sm">Edit LPJ <i class="fa fa-edit"></i></a>

             <!-- et -->
             <!-- <div class="row form-group">
              <div class="col-5 col-md-3">
                <label for="password-input" class=" form-control-label">Berita Acara</label>
              </div>
              <input type="hidden" name="berita_acara" class="form-control" value="{{$data_proker->berita_acara}}">
              <div class="col-5 col-md-7">
                <p>{{$data_proker->berita_acara}}</p>
              </div>
              <div class="col-2 col-md-2">
                <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->berita_acara}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
              </div>
            </div>
            <hr/>
            <div class="row form-group">
              <div class="col-5 col-md-3">
                <label for="password-input" class=" form-control-label">LPJ Kegiatan</label>
              </div>
              <input type="hidden" name="lpj" class="form-control" value="{{$data_proker->lpj}}">
              <div class="col-5 col-md-7">
                <p>{{$data_proker->lpj}}</p>
              </div>
              <div class="col-2 col-md-2">
                <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->lpj}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
              </div>
            </div>
            <hr/>
            <div class="row form-group">
              <div class="col-12 col-md-3">
                <label for="password-input" class=" form-control-label">Deskripsi</label>
              </div>
              <input type="hidden" name="waktu" class="form-control" value="{{$data_proker->keterangan}}">
              <div class="col-12 col-md-9">
               <p class="">{{$data_proker->keterangan}}</p>
             </div>
           </div>
           <a href="/agenda-kegiatan/lpj/edit/{{$data_proker->id}}" class="btn btn-primary btn-sm">Edit LPJ <i class="fa fa-edit"></i></a> -->

           @elseif($data_proker->status == 'TTD Dekan')
           <div class="row form-group">
            <div class="col-5 col-md-3">
              <label for="password-input" class=" form-control-label">Berita Acara</label>
            </div>
            <input type="hidden" name="berita_acara" class="form-control" value="{{$data_proker->berita_acara}}">
            <div class="col-5 col-md-7">
              <p>{{$data_proker->berita_acara}}</p>
            </div>
            <div class="col-2 col-md-2">
              <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->berita_acara}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
            </div>
          </div>
          <hr/>
          <div class="row form-group">
            <div class="col-5 col-md-3">
              <label for="password-input" class=" form-control-label">LPJ Kegiatan</label>
            </div>
            <input type="hidden" name="lpj" class="form-control" value="{{$data_proker->lpj}}">
            <div class="col-5 col-md-7">
              <p>{{$data_proker->lpj}}</p>
            </div>
            <div class="col-2 col-md-2">
              <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->lpj}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
            </div>
          </div>
          <hr/>
          <div class="row form-group">
            <div class="col-12 col-md-3">
              <label for="password-input" class=" form-control-label">Deskripsi</label>
            </div>
            <input type="hidden" name="waktu" class="form-control" value="{{$data_proker->keterangan}}">
            <div class="col-12 col-md-9">
             <p class="">{{$data_proker->keterangan}}</p>
           </div>
         </div>
         <a href="/agenda-kegiatan/lpj/edit/{{$data_proker->id}}" class="btn btn-primary btn-sm">Edit LPJ <i class="fa fa-edit"></i></a>

         @elseif($data_proker->status == 'Waiting')
         <div class="row form-group">
          <div class="col-5 col-md-3">
            <label for="password-input" class=" form-control-label">Berita Acara</label>
          </div>
          <input type="hidden" name="berita_acara" class="form-control" value="{{$data_proker->berita_acara}}">
          <div class="col-5 col-md-7">
            <p>{{$data_proker->berita_acara}}</p>
          </div>
          <div class="col-2 col-md-2">
            <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->berita_acara}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
          </div>
        </div>
        <hr/>
        <div class="row form-group">
          <div class="col-5 col-md-3">
            <label for="password-input" class=" form-control-label">LPJ Kegiatan</label>
          </div>
          <input type="hidden" name="lpj" class="form-control" value="{{$data_proker->lpj}}">
          <div class="col-5 col-md-7">
            <p>{{$data_proker->lpj}}</p>
          </div>
          <div class="col-2 col-md-2">
            <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->lpj}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
          </div>
        </div>
        <hr/>
        <div class="row form-group">
          <div class="col-12 col-md-3">
            <label for="password-input" class=" form-control-label">Deskripsi</label>
          </div>
          <input type="hidden" name="waktu" class="form-control" value="{{$data_proker->keterangan}}">
          <div class="col-12 col-md-9">
           <p class="">{{$data_proker->keterangan}}</p>
         </div>
       </div>
       <a href="/agenda-kegiatan/lpj/edit/{{$data_proker->id}}" class="btn btn-primary btn-sm">Edit LPJ <i class="fa fa-edit"></i></a>

       @elseif($data_proker->status == 'Selesai')
           <div class="row form-group">
            <div class="col-5 col-md-3">
              <label for="password-input" class=" form-control-label">Berita Acara</label>
            </div>
            <input type="hidden" name="berita_acara" class="form-control" value="{{$data_proker->berita_acara}}">
            <div class="col-5 col-md-7">
              <p>{{$data_proker->berita_acara}}</p>
            </div>
            <div class="col-2 col-md-2">
              <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->berita_acara}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
            </div>
          </div>
          <hr/>
          <div class="row form-group">
            <div class="col-5 col-md-3">
              <label for="password-input" class=" form-control-label">LPJ Kegiatan</label>
            </div>
            <input type="hidden" name="lpj" class="form-control" value="{{$data_proker->lpj}}">
            <div class="col-5 col-md-7">
              <p>{{$data_proker->lpj}}</p>
            </div>
            <div class="col-2 col-md-2">
              <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->lpj}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
            </div>
          </div>
          <hr/>
          <div class="row form-group">
            <div class="col-12 col-md-3">
              <label for="password-input" class=" form-control-label">Deskripsi</label>
            </div>
            <input type="hidden" name="waktu" class="form-control" value="{{$data_proker->keterangan}}">
            <div class="col-12 col-md-9">
             <p class="">{{$data_proker->keterangan}}</p>
           </div>
         </div>
         <a href="/agenda-kegiatan/lpj/edit/{{$data_proker->id}}" class="btn btn-primary btn-sm">Edit LPJ <i class="fa fa-edit"></i></a>

       @else

       <h3>Anda Dapat Mengjukan Laporan Pertanggung Jawaban Setelah Program Kerja telah Selesai, atau status dalam Proses Pelakasanaan, <p style="padding-top: 5px;"><b>Status Saat Ini : 
        @if ($data_proker->status === 'Pengajuan Proposal')
        <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'Revisi KaProdi')
        <span style="background-color: #d9455f; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'Pengajuan Kaprodi')
        <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'Pengajuan Dekan')
        <span style="background-color: #1f4068; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'Revisi Dekan')
        <span style="background-color: #b5076b; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'Proses Pelaksanaan')
        <span style="background-color: #00a1ab; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'Pengajuan LPJ')
        <span style="background-color: #f5a31a; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'TTD Dekan')
        <span style="background-color: #f6d743; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @elseif ($data_proker->status === 'Selesai')
        <span style="background-color: #0c9463; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @else
        <span style="background-color: #dc3545; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
        @endif 
      </b></p></h3>
      @endif
    </div>
  </form>
</div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content -->

<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card-header">Dokumentasi Kegiatan : <b>{{$data_proker->kegiatan}}</b></div>
            <div class="card-body card-block">
              @foreach ($data_dokumentasi as $gambar)
              <a href="{{URL::to('/')}}/public/dokumentasi/{{$gambar->file_gambar}}" target="_blank">
                <img src="{{URL::to('/')}}/public/dokumentasi/{{$gambar->file_gambar}}" class="img-thumbnail" width="150"></a>
                @endforeach
              </div>
              <div class="col-sm-6">
                <a href="/tambah/dokumentasi/{{$data_proker->id}}" class="btn btn-success btn-sm">Tambah Dokumentasi
                </a>
                <a href="/dokumentasi/{{$data_proker->id}}" class="btn btn-primary btn-sm">View Dokumentasi
                </a>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div><!-- .animated -->
  </div><!-- .content -->


  @endsection