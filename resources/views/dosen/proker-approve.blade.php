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
            <h1>Pengajuan Proposal  : <b>{{$data_proker->kegiatan}}</b></h1>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="page-header float-right">
          <div class="page-title">
            <h1>Status :<b>
              @if ($data_proker->status === 'Pengajuan Proposal')
              <span style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Pengajuan Kaprodi')
              <span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">{{$data_proker->status}}</span>
              @elseif ($data_proker->status === 'Waiting')
              <span style="background-color: #d9455f; padding: 2px 5px 2px 5px; border-radius: 5px; color: black;">{{$data_proker->status}}</span>
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
          <form action="/agenda-kegiatan/approved/{{$data_proker->id}}/proker" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
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
       <hr/>

       @if ($data_proker->status === 'Belum Terlaksana')
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
      <div class="col-12 col-md-3">
        <label for="password-input" class=" form-control-label">Proposal Kegiatan</label>
      </div>
      <div class="col-12 col-md-7">
        <p>{{$data_proker->proposal}}</p>
      </div>
      <div class="col-12 col-md-2">
        <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->proposal}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
      </div>
    </div>
    <hr/>
    @endif <!-- endif status belum terlaksana -->

    @if($data_proker->status == 'Selesai')
    @elseif(auth()->user()->role_login == 'DPM')
    <div class="row form-group">
      <div class="col-12 col-md-3">
        <label for="password-input" class=" form-control-label">Approved</label>
      </div>
      <div class="col-12 col-md-4">
        <select id="status" name="status" class="custom-select custom-select-md">
          <option value="{{$data_proker->status}}">{{$data_proker->status}}</option>
          @if(auth()->user()->ormawa == 'FTIK')
          <option value="Pengajuan Dekan">Accepted</option>
          @else
          <option value="Pengajuan Kaprodi">Accepted</option>
          @endif
          <option value="Rejected">Rejected</option>
        </select>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-12 col-md-3">
        <label for="password-input" class=" form-control-label">Notes</label>
      </div>
      <div class="col-12 col-md-7">
        <textarea name="ket" class="form-control">{{$data_proker->ket}}</textarea>
      </div>
    </div>

    @if ($data_proker->status === 'Pengajuan Proposal')
    <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">SEND</button>
    <!-- @elseif (auth()->user()->ormawa == 'FTIK')
    <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">SEND</button> -->
    @endif <!-- endif button -->

    @endif <!-- endif selesai role dpm -->

    @if($data_proker->status == 'Selesai')
    @elseif(auth()->user()->role_login == 'KaProdi')
    <div class="row form-group">
      <div class="col-12 col-md-3">
        <label for="password-input" class=" form-control-label">Approved</label>
      </div>
      <div class="col-12 col-md-4">
        <select id="status" name="status" class="custom-select custom-select-md">
          <option value="{{$data_proker->status}}">{{$data_proker->status}}</option>
          <option value="Revisi KaProdi">Revisi</option>
          <option value="Pengajuan Dekan">Accepted</option>
        </select>
      </div>
      <div class="col-2 col-md-3">
        @if($data_proker->status == 'Selesai')
        @else
        <input type="file" name="proposal" class="form-control">
        @endif
      </div>
    </div>

    <div class="row form-group">
      <div class="col-12 col-md-3">
        <label for="password-input" class=" form-control-label">Notes</label>
      </div>
      <div class="col-12 col-md-7">
        <textarea name="ket" class="form-control">{{$data_proker->ket}}</textarea>
      </div>
    </div>

    @if ($data_proker->status === 'Pengajuan Kaprodi')
    <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">KIRIM</button>
    @elseif ($data_proker->status === 'Revisi KaProdi')
    <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">KIRIM</button>
    @endif <!-- endif button -->

    @endif <!-- endif selesai role Kaprodi -->

    @if ($data_proker->status == 'Selesai')
    @elseif(auth()->user()->role_login == 'Dekanat')
    <div class="row form-group">
      <div class="col-12 col-md-3">
        <label for="password-input" class=" form-control-label">Approved</label>
      </div>
      <div class="col-12 col-md-4">
        <select id="status" name="status" class="custom-select custom-select-md">
          <option value="{{$data_proker->status}}">{{$data_proker->status}}</option>
          <option value="Waiting">Waiting</option>
          <option value="Revisi Dekan">Revisi</option>
          <option value="Proses Pelaksanaan">Accepted</option>
        </select>
      </div>
      <div class="col-2 col-md-3">
                  @if($data_proker->status == 'Selesai')
                  @else
                  <input type="file" name="proposal" class="form-control">
                  @endif
                </div>
    </div>

    <div class="row form-group">
      <div class="col-12 col-md-3">
        <label for="password-input" class=" form-control-label">Notes</label>
      </div>
      <div class="col-12 col-md-7">
        <textarea name="ket" class="form-control">{{$data_proker->ket}}</textarea>
      </div>
    </div>

    @if ($data_proker->status === 'Pengajuan Dekan')
    <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">KIRIM</button>
    @elseif ($data_proker->status === 'Revisi Dekan')
    <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">KIRIM</button>
    @endif <!-- endif Button -->

    @endif <!-- endif selesai role Dekanat -->

    @if($data_proker->status === 'Selesai')

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
        <label for="password-input" class="form-control-label">LPJ Kegiatan</label>
      </div>
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
        <label for="password-input" class=" form-control-label">Status</label>
      </div>
      <div class="col-12 col-md-7">
        <p>{{$data_proker->status}}</p>
      </div>
    </div>
    @endif <!-- endif Status Selesai -->
  </div>
</form>


</div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content -->



<!-- approved LPJ -->
@if($data_proker->status === 'Pengajuan LPJ')
<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">

          <form action="/agenda-kegiatan/approved/{{$data_proker->id}}/lpj" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-header"><strong>Laporan PJ</strong> - {{$data_proker->kegiatan}}</div>
            <div class="card-body card-block">
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
                <div class="col-5 col-md-7">
                  <p>{{$data_proker->lpj}}</p>
                </div>
                <div class="col-2 col-md-2">
                  <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->lpj}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
                </div>
              </div>
              <hr/>
              @if(auth()->user()->role_login == 'KaProdi')
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Approved</label>
                </div>
                <div class="col-12 col-md-4">
                  <select id="status" name="status" class="custom-select custom-select-md">
                    <option value="{{$data_proker->status}}">{{$data_proker->status}}</option>
                    <!-- <option value="Perbaikan LPJ">Revisi</option> -->
                    <option value="TTD Dekan">Accepted</option>
                  </select>
                </div>
                <div class="col-2 col-md-3">
                  @if($data_proker->status == 'Selesai')
                  @else
                  <input type="file" name="lpj" class="form-control">
                  @endif
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Notes</label>
                </div>
                <div class="col-12 col-md-7">
                  <textarea class="form-control" name="keterangan"></textarea>
                </div>
              </div>
              @endif <!-- endif role kaprodi -->

              @if(auth()->user()->role_login == 'Dekanat')
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Approved</label>
                </div>
                <div class="col-12 col-md-4">
                  <select id="status" name="status" class="custom-select custom-select-md">
                    <option value="{{$data_proker->status}}">{{$data_proker->status}}</option>
                    <option value="Waiting">Waiting</option>
                    <!-- <option value="Perbaikan LPJ">Revisi</option> -->
                    <option value="Selesai">Accepted</option>
                  </select>
                </div>
                <div class="col-2 col-md-3">
                  @if($data_proker->status == 'Selesai')
                  @else
                  <input type="file" name="lpj" class="form-control">
                  @endif
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Notes</label>
                </div>
                <div class="col-12 col-md-7">
                  <textarea class="form-control" name="keterangan"></textarea>
                </div>
              </div>
              @endif <!-- endif role dekan -->

            </div>
            @if(auth()->user()->role_login == 'DPM')
            @elseif(auth()->user()->role_login == 'KaProdi')
            <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">KIRIM</button>
            @elseif(auth()->user()->role_login == 'Dekanat')
            <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">KIRIM</button>
            @endif <!-- endif button -->
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endif <!-- end if status pengajuan LPJ -->

@if($data_proker->status === 'TTD Dekan')
<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">

          <form action="/agenda-kegiatan/approved/{{$data_proker->id}}/lpj" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-header"><strong>Laporan PJ</strong> - {{$data_proker->kegiatan}}</div>
            <div class="card-body card-block">
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
                <div class="col-5 col-md-7">
                  <p>{{$data_proker->lpj}}</p>
                </div>
                <div class="col-2 col-md-2">
                  <a href="{{URL::to('/')}}/public/dokumen/{{$data_proker->lpj}}" target="_blank"><i class="btn btn-primary btn-sm fa fa-check-square-o"></i></a>
                </div>
              </div>
              <hr/>

              @if(auth()->user()->role_login == 'Dekanat')
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Approved</label>
                </div>
                <div class="col-12 col-md-4">
                  <select id="status" name="status" class="custom-select custom-select-md" value="{{$data_proker->status}}">
                    <option value="{{$data_proker->status}}">{{$data_proker->status}}</option>
                    <option value="Waiting">Waiting</option>
                    <!-- <option value="Perbaikan LPJ">Revisi</option> -->
                    <option value="Selesai">Accepted</option>
                  </select>
                </div>
                <div class="col-2 col-md-3">
                  <input type="file" name="lpj" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12 col-md-3">
                  <label for="password-input" class=" form-control-label">Notes</label>
                </div>
                <div class="col-12 col-md-7">
                  <textarea class="form-control" name="keterangan">{{$data_proker->keterangan}}</textarea>
                </div>
              </div>
              @endif <!-- endif role dekan -->

            </div>
            @if(auth()->user()->role_login == 'Dekanat')
            <button class="btn btn-success" type="submit" style="float: left; margin: 20px;">KIRIM</button>
            @else
            @endif <!-- endif button -->
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endif <!-- endif status TTD Dekan -->

<div class="content">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
            <div class="card-body card-block">
              @foreach ($data_dokumentasi as $gambar)
              <a href="{{URL::to('/')}}/public/dokumentasi/{{$gambar->file_gambar}}" target="_blank">
                <img src="{{URL::to('/')}}/public/dokumentasi/{{$gambar->file_gambar}}" class="img-thumbnail" width="150"></a>
                @endforeach
                <a href="/dokumentasi/{{$data_proker->id}}" class="btn btn-primary btn-sm">View Dokumentasi
                </a>
              </div>
        </div>
      </div>
    </div><!-- .animated -->
  </div><!-- .content -->
</div>


@endsection