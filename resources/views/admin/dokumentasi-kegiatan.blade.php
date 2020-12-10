@extends('base.adbase')
<title>Admin | Profil himatif</title>
@section('content')
<!-- Playlist section -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            @foreach ($data_dokumentasi as $dokumentasi)
            <div class="col-lg-3 col-md-6">
                <a href="{{URL::to('/')}}/public/dokumentasi/{{$dokumentasi->file_gambar }}">
                    <img src="{{URL::to('/')}}/public/dokumentasi/{{$dokumentasi->file_gambar }}" width="320">
                </a>
            </div>
            @endforeach
        </div>
        {{$data_dokumentasi->links()}}
    </div>
</div>

<!-- Button trigger modal -->

@endsection 