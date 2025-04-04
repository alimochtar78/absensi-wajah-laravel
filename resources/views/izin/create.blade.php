@extends('layouts.app')

@section('title', 'Ajukan Izin')

@section('content')
<h3>Form Pengajuan Izin / Cuti</h3>

@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="{{ route('izin.store') }}" method="POST">
	@csrf
	<div class="mb-3">
		<label>Jenis</label>
		<select name="jenis" class="form-control">
			<option value="izin">Izin</option>
			<option value="cuti">Cuti</option>
		</select>
	</div>
	<div class="mb-3">
		<label>Tanggal Mulai</label>
		<input type="date" name="tanggal_mulai" class="form-control" required>
	</div>
	<div class="mb-3">
		<label>Tanggal Selesai</label>
		<input type="date" name="tanggal_selesai" class="form-control" required>
	</div>
	<div class="mb-3">
		<label>Alasan</label>
		<textarea name="alasan" class="form-control" required></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Kirim</button>
</form>
@endsection
