@extends('base.baseU')
<title>Events Ormawa FTIK</title>
@section('user-content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Bem Ftik</li>
        </ol>
        <h2>ANGGOTA BEM FTIK</h2>

      </div>
    </section>
    <!-- End Breadcrumbs -->

    <section class="inner-page team section-bg" >
      <div class="container">
        <div class="row">
          @foreach ($data_anggota as $anggota)
          <div class="col-lg-4 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{URL::to('/')}}/public/gambar/{{$anggota->fotoP}}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>{{$anggota->nama}}</h4>
                <span>{{$anggota->jabatan}}</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <button class="btn btn-success btn-sm" style="margin-right: 7px;">{{$anggota->status}}</button>
                  <a href="https://api.whatsapp.com/send?phone={{$anggota->no_hp}}"><i class="ri-whatsapp-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
  </main><!-- End #main -->

@endsection