<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\SaranaPrasarana;
use App\Models\RekapanPeminjaman;
use App\Models\Peminjaman;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->role_id == 1){
            $data['kategori'] = Kategori::count();
            $data['sarana'] = SaranaPrasarana::where('tipe', 'Sarana')->count();
            $data['prasarana'] = SaranaPrasarana::where('tipe', 'Prasarana')->count();
            return view('admin.dashboard.index')->with($data);
        }elseif($user->role_id == 2){
            $data['riwayat'] = RekapanPeminjaman::where('user_id', $user->id)->get();
            $data['peminjaman'] = Peminjaman::where('user_id', $user->id)->get();
            return view('user.dashboard.index')->with($data);
        }else{
            return redirect()->route('landing');
        }
    }
}
