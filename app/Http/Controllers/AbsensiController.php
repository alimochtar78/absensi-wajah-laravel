<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'face_encoding' => 'required|string',
        ]);

        // Kirim gambar ke API Python untuk verifikasi wajah
        $response = Http::post('http://127.0.0.1:5000/verify-face', [
            'face_encoding' => $request->face_encoding
        ]);

        $data = $response->json();

        if ($response->failed() || $data['status'] == 'error') {
            return back()->with('error', 'Wajah tidak dikenali!');
        }

        $user = Auth::user();
        $absen = Absensi::where('user_id', $user->id)->whereDate('tanggal', Carbon::today())->first();

        if ($absen) {
            // Sudah absen masuk, simpan jam pulang
            $absen->update([
                'jam_pulang' => Carbon::now()->format('H:i:s'),
            ]);
            return back()->with('success', 'Absen pulang berhasil untuk ' . $data['name']);
        }

        // Belum absen hari ini, simpan absen masuk
        Absensi::create([
            'user_id' => $user->id,
            'tanggal' => Carbon::today(),
            'jam_masuk' => Carbon::now()->format('H:i:s'),
            'status' => 'hadir',
        ]);

        return back()->with('success', 'Absen masuk berhasil untuk ' . $data['name']);
    }
}
