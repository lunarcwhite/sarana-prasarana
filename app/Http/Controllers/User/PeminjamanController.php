<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\RekapanPeminjaman;
use App\Models\SaranaPrasarana;
use Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function notifikasi($type, $message)
    {
        return [
            'alert-type' => $type,
            'message' => $message
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal_mulai_peminjaman' => 'required',
            'durasi_peminjaman' => 'required|integer',
            'jumlah_pinjam' => 'required|integer',
        ]);
        $id = $request->sarana_prasarana_id;
        $sarana = SaranaPrasarana::where('id', $id)->first();
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['tanggal_pengajuan_peminjaman'] = date('Y-m-d');
        $data['status_peminjaman'] = 2;
        $admin = Auth::user()->role_id;

        if($admin == 1){
            return redirect()
            ->back()
            ->withErrors('Akun Admin Tidak Dapat Melakukan Peminjaman');
        } 

        if($request->tanggal_mulai_peminjaman < date('Y-m-d')){

            return redirect()
            ->back()
            ->with($this->notifikasi('error','Tanggal Pengajuan Tidak Bisa Kurang Dari Tanggal Hari Ini'));
        }
       
        if($request->jumlah_pinjam > $sarana->jumlah){
            return redirect()
            ->back()
            ->with($this->notifikasi('error', 'Jumlah Peminjaman Melebihi Stok Tersedia'));
        }
            try {
                $peminjaman = new Peminjaman;
                $peminjaman::create($data);
                return redirect()
                ->back()
                ->with($this->notifikasi('success', 'Pengajuan Peminjaman Berhasil Dibuat'));
            } catch (\Throwable $th) {
                return redirect()
                ->back()
                ->withErrors($th->getMessage());
            }
        


    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

}
