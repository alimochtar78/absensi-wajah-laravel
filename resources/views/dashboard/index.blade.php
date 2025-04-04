@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="card bg-primary text-white">
			<div class="card-body">
				<h5>Total Karyawan</h5>
				<h3>{{ $totalKaryawan }}</h3>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card bg-success text-white">
			<div class="card-body">
				<h5>Hadir Hari Ini</h5>
				<h3>{{ $totalHadirHariIni }}</h3>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card bg-warning text-dark">
			<div class="card-body">
				<h5>Izin Hari Ini</h5>
				<h3>{{ $totalIzinHariIni }}</h3>
			</div>
		</div>
	</div>
</div>
@endsection
