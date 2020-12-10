@extends('base.baseU')
<title>Agenda Kegiatan | FTIK</title>
@section('user-content')

<main id="main">

	<!-- ======= Breadcrumbs ======= -->
	<section id="breadcrumbs" class="breadcrumbs">
		<div class="container">

			<ol>
				<li><a href="index.html">Home</a></li>
				<li>Agenda Kegiatan</li>
			</ol>
			<h2>Agenda Kegiatan ORMAWA FTIK</h2>

		</div>
	</section><!-- End Breadcrumbs -->

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">
			<div class="portfolio-description">
				<form action="" method="GET">
					{{csrf_field()}}
					<div class="input-group custom-search-form col-md-2" style="float: left; padding: 10px;">
						<select name="filter" class="form-control">
							<option value="">ORMAWA</option>
							<option value="FTIK">FTIK</option>
							<option value="HIMATIF">HIMATIF</option>
							<option value="HIMASI">HIMASI</option>
							<option value="HMTM">HMTM</option>
							<option value="HMTI">HMTI</option>
						</select>
					</div>
					<div class="input-group custom-search-form col-md-2" style="float: left; padding: 10px;">
						<select name="month" class="form-control">
							<option value="">BULAN</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</div>
					<div class="input-group custom-search-form col-md-6" style="float: left; padding: 10px;">
						<input type="text" class="form-control" name="cari" placeholder="search....">
					</div>
					<button type="submit" class="btn btn-info btn-sm" style="margin: 10px;">SUBMIT</button>
				</form> 

				<table class="table table-striped">
					<thead>
						<tr class="text-center" style="background-color: #c40018; color: white;">
							<th>No</th>
							<th>Kegiatan</th>
							<th>Unit Kerja</th>
							<th>Tempat</th>
							<th>Waktu</th>
							<!-- <th>status</th> -->
							<th>Dokumentasi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; ?>
						@foreach ($data_proker as $proker)
						<?php $no++;  ?>
						<tr class="text-center">
							<td>{{$no}}</td>
							<td>{{$proker->kegiatan}}</td>
							<td>{{$proker->unit}}</td>
							<td>{{$proker->tempat}}</td>
							<td>{{$proker->waktu}}</td>
							<!-- <td style="color: red;">{{$proker->status}}</td> -->
							<td><a href="">Dokumentasi</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $data_proker->links()}}
			</div>

		</div>
	</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

@endsection