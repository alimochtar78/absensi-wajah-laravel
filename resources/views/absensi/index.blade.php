@extends('layouts.app')

@section('title', 'Absensi')

@section('content')
<h3>Absensi Karyawan</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<video id="video" width="100%" autoplay></video>
<canvas id="canvas" style="display: none;"></canvas>
<form action="{{ route('absensi.store') }}" method="POST">
	@csrf
	<input type="hidden" name="face_encoding" id="face_encoding">
	<button type="submit" class="btn btn-primary mt-3">Absen Sekarang</button>
</form>

<script>
	const video = document.getElementById('video');
	navigator.mediaDevices.getUserMedia({ video: true })
	.then(stream => video.srcObject = stream)
	.catch(err => console.error("Akses kamera ditolak!", err));

	document.querySelector("form").addEventListener("submit", function(event) {
		event.preventDefault();
		const canvas = document.getElementById('canvas');
		const ctx = canvas.getContext('2d');
		ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
		document.getElementById('face_encoding').value = canvas.toDataURL();
		this.submit();
	});
</script>
@endsection
