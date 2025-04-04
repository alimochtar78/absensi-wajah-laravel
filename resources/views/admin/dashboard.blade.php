@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mb-4">
	<h1>Selamat Datang Admin</h1>
	<p>Silakan kelola aplikasi dari sini.</p>
	<a href="{{ route('admin.users') }}" class="btn btn-primary">Kelola Pengguna</a>
</div>
@endsection
