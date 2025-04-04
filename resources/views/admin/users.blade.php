@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Manajemen Pengguna</h2>

	@if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
	@endif

	<table class="table">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Email</th>
				<th>Role</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					<form action="{{ route('admin.updateRole', $user->id) }}" method="POST">
						@csrf
						<select name="role" onchange="this.form.submit()">
							<option value="karyawan" {{ $user->role == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
							<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
						</select>
					</form>
				</td>
				<td>
					<form action="{{ route('admin.delete', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
