<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKaryawan = User::where('role', 'karyawan')->count();
        $totalHadirHariIni = Absensi::where('tanggal', Carbon::today())->count();
        $totalIzinHariIni = Absensi::where('status', 'izin')->where('tanggal', Carbon::today())->count();

        return view('dashboard.index', compact('totalKaryawan', 'totalHadirHariIni', 'totalIzinHariIni'));
    }
}
