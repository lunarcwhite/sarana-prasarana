<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Storage;

class SaranaPrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function getSaranaPrasarana()
    {
        return SaranaPrasarana::with('kategori')->orderBy('nama_sarana_prasarana', 'ASC')->get();
    }
    function getOneSaranaPrasarana($id)
    {
        return SaranaPrasarana::with('kategori')->where('id', $id)->first();
    }
    function getKategori()
    {
        return Kategori::all();
    }

    public function index()
    {
        $data['sarana_prasaranas'] = $this->getSaranaPrasarana();
        $data['kategoris'] = $this->getKategori();
        return view('admin.sarana_prasarana.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_sarana_prasarana' => 'required|unique:sarana_prasaranas,nama_sarana_prasarana',
            'jumlah' => 'required|integer',
            'kategori_id' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'kondisi' => 'required'
        ]);

        try {
            $foto = $request->photo;
    
            if ($request->hasFile('photo')) {
                $extension = $foto->extension();
                $filename = 'photo_' . $request->nama_sarana_prasarana .'_'.$request->tipe .'_' . time() . '.' . $extension;
                $foto->storeAs('public/images/'.$request->tipe, $filename);
                $fotoDb = $filename;
            } else {
                $fotoDb = null;
            }
            $data = $request->all();
            $data['photo'] = $fotoDb;
            SaranaPrasarana::create($data);
            $notification = [
                'alert-type' => 'success',
                'message' => 'Berhasil Menambah Data',
            ];
            return redirect()
                ->back()
                ->with($notification);
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withErrors('Gagal menambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SaranaPrasarana $saranaPrasarana)
    {
        $data['saranaPrasarana'] = $this->getOneSaranaPrasarana($saranaPrasarana->id);
        return view('admin.sarana_prasarana.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaranaPrasarana $saranaPrasarana)
    {
        return $saranaPrasarana;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaranaPrasarana $saranaPrasarana)
    {
        $validate = $request->validate([
            'nama_sarana_prasarana' => 'required',
            'jumlah' => 'required|integer',
            'kategori_id' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'kondisi' => 'required'
        ]);

        try {
            $foto = $request->photo;
    
            if ($request->hasFile('photo')) {
                if($saranaPrasarana->photo !== null){
                    Storage::delete('public/images/'.$saranaPrasarana->tipe.'/'.$saranaPrasarana->photo);
                }
                $extension = $foto->extension();
                $filename = 'photo_' . $request->nama_sarana_prasarana .'_'.$request->tipe .'_' . time() . '.' . $extension;
                $foto->storeAs('public/images/'.$request->tipe, $filename);
                $fotoDb = $filename;
                
            } else {
                $fotoDb = null;
            }
            $data = $request->except('_token', '_method');
            $data['photo'] = $fotoDb;
            $saranaPrasarana->update($data);
            $notification = [
                'alert-type' => 'success',
                'message' => 'Berhasil Memperbarui Data',
            ];
            return redirect()
                ->back()
                ->with($notification);
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withErrors('Gagal memperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaranaPrasarana $saranaPrasarana)
    {
        try {
            if($saranaPrasarana->photo !== null){
                Storage::delete('public/images/'.$saranaPrasarana->tipe.'/'.$saranaPrasarana->photo);
            }
            $saranaPrasarana->delete();
            $notification = [
                'alert-type' => 'success',
                'message' => 'Berhasil Menghapus Data',
            ];
            return redirect()
                ->back()
                ->with($notification);
        } catch (\Throwable $th) {
            return redirect()
            ->back()
            ->withErrors('Gagal menghapus!');
        }
    }
}
