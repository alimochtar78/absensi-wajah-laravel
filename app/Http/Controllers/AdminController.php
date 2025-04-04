<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    // Menampilkan daftar user
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Mengubah role user
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role user berhasil diperbarui!');
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
