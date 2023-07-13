<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\RekapanPeminjaman;
use App\Models\SaranaPrasarana;

class KelolaPeminjamanController extends Controller
{
    public function notifikasi($type, $message)
    {
        return [
            'alert-type' => $type,
            'message' => $message
        ];
    }
    public function pending()
    {
        $data['peminjamans'] = Peminjaman::where('status_peminjaman', 2)->orderBy('created_at')->get();
        return view('admin.peminjaman.pending')->with($data);
    }
    public function berlangsung()
    {
        $data['peminjamans'] = Peminjaman::where('status_peminjaman', 1)->orderBy('updated_at', 'desc')->get();
        return view('admin.peminjaman.berlangsung')->with($data);
    }
    public function ditolak()
    {
        $data['peminjamans'] = Peminjaman::where('status_peminjaman', 0)->orderBy('updated_at', 'desc')->get();
        return view('admin.peminjaman.ditolak')->with($data);
    }
    public function selesai(Request $request, $id)
    {
        $id = $request->id;
        $data_pinjam = Peminjaman::where('id', $id)->first();
        $idSarana = $request->id_sarana;
        $sarana = SaranaPrasarana::where('id', $idSarana)->first();
        try {
            $data = [
                'user_id' => $data_pinjam->user_id,
                'sarana_prasarana_id' => $data_pinjam->sarana_prasarana_id,
                'tanggal_mulai_peminjaman' => date('Y-m-d'),
                'durasi_peminjaman' => $data_pinjam->durasi_peminjaman,
                'tanggal_pengembalian' => date('Y-m-d'),
                'kondisi_awal' => $request->kondisi_awal,
                'kondisi_pengembalian' => $request->kondisi_pengembalian
            ];
            SaranaPrasarana::where('id', $idSarana)->update([
                'kondisi' => $request->kondisi_pengembalian,
                'jumlah' => $request->jumlah_pinjam + $sarana->jumlah,
            ]);
            RekapanPeminjaman::create($data);
            $data_pinjam->delete();
            return redirect()
            ->back()
            ->with($this->notifikasi('success','Aksi Berhasil Dilakukan'));
            
        } catch (\Throwable $th) {
            return redirect()
            ->back()
            ->with($this->notifikasi('error','Aksi Gagal!'));
        }
    }
      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $peminjaman = Peminjaman::where('id', $id)->first();
        $status = $request->status_peminjaman;
        try {
            $peminjaman->where('id', $id)->update([
                'status_peminjaman' => $status,
                'keterangan' => $request->keterangan
            ]);
            if($status == 1){
                $sarana = SaranaPrasarana::where('id', $peminjaman->sarana_prasarana_id)->first(); 
                $sarana->where('id', $peminjaman->sarana_prasarana_id)->update([
                    'jumlah' => $sarana->jumlah - $request->jumlah_pinjam
                ]);
            }
            return redirect()
            ->back()
            ->with($this->notifikasi('success','Aksi Berhasil Dilakukan'));
            
        } catch (\Throwable $th) {
            return redirect()
            ->back()
            ->with($this->notifikasi('error',$th->getMessage()));
        }
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Peminjaman::where('id', $id)->delete();
            return redirect()
            ->back()
            ->with($this->notifikasi('success','Aksi Berhasil Dilakukan'));
            
        } catch (\Throwable $th) {
            return redirect()
            ->back()
            ->with($this->notifikasi('error',$th->getMessage()));
        }
    }
}
