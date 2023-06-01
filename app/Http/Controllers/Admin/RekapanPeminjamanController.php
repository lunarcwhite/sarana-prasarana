<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekapanPeminjaman;
use PDF;

class RekapanPeminjamanController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('tanggal')) {
            $date = explode('-', $request->tanggal);
            $data['rekapans'] = RekapanPeminjaman::whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])->get();
            return view('admin.rekapan_peminjaman.index')->with($data);
        }else{
            $data['rekapans'] = RekapanPeminjaman::all();
            return view('admin.rekapan_peminjaman.index')->with($data);
        }
    }
    public function print(Request $request)
    {
        $tanggal = $request->tanggal;
        $rekapans = RekapanPeminjaman::all();
        if($tanggal == null) {
            $rekapans = RekapanPeminjaman::all();
            $pdf = PDF::loadview('admin.rekapan_peminjaman.print', ['rekapans' => $rekapans]);
        }else{
            $date = explode('-', $request->tanggal);
            $rekapans = RekapanPeminjaman::whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])->get();
            $pdf = PDF::loadview('admin.rekapan_peminjaman.print', ['rekapans' => $rekapans]);
        }
        return $pdf->download('rekap_peminjaman_'.$tanggal.'.pdf');
    }
}
