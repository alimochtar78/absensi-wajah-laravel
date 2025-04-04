@extends('layouts.app')

@section('title', 'Izin & Cuti')

@section('content')
<h3>Pengajuan Izin & Cuti</h3>
<a href="{{ route('izin.create') }}" class="btn btn-success mb-3">Ajukan Izin</a>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Jenis</th>
			<th>Tanggal</th>
			<th>Alasan</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($izinCuti as $izin)
		<tr>
			<td>{{ ucfirst($izin->jenis) }}</td>
			<td>{{ $izin->tanggal_mulai }} - {{ $izin->tanggal_selesai }}</td>
			<td>{{ $izin->alasan }}</td>
			<td>
				@if($izin->status == 'pending')
				<span class="badge bg-warning">Pending</span>
				@elseif($izin->status == 'disetujui')
				<span class="badge bg-success">Disetujui</span>
				@else
				<span class="badge bg-danger">Ditolak</span>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
