<?php

namespace App\Http\Controllers;

use App\Models\IzinCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinCutiController extends Controller
{
    public function index()
    {
        $izinCuti = IzinCuti::where('user_id', Auth::id())->orderBy('tanggal_mulai', 'desc')->get();
        return view('izin.index', compact('izinCuti'));
    }

    public function create()
    {
        return view('izin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:izin,cuti',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
        ]);

        IzinCuti::create([
            'user_id' => Auth::id(),
            'jenis' => $request->jenis,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'status' => 'pending',
        ]);

        return redirect()->route('izin.index')->with('success', 'Pengajuan izin/cuti berhasil dikirim');
    }
}
