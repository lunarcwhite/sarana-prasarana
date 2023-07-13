<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RekapanPeminjaman;
use Illuminate\Http\Request;
use Auth;
use App\Models\Peminjaman;

class RiwayatPeminjamanController extends Controller
{
    public function riwayat(Request $request)
    {
        if($request->filled('tanggal')) {
            $date = explode('-', $request->tanggal);
            $data['rekapans'] = RekapanPeminjaman::whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])->where('user_id', Auth::user()->id)->get();
            return view('user.riwayat_peminjaman.selesai')->with($data);
        }else{
            $data['rekapans'] = RekapanPeminjaman::where('user_id', Auth::user()->id)->get();
            return view('user.riwayat_peminjaman.selesai')->with($data);
        }
    }

    public function berlangsung()
    {
        $data['peminjamans'] = Peminjaman::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        return view('user.riwayat_peminjaman.berlangsung')->with($data);
    }
}
