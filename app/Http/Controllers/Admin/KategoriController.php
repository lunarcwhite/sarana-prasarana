<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getKategori()
    {
        return Kategori::all();
    }

    public function getOneKategori($id)
    {
        return Kategori::where('id', $id)->first();
    }

    public function index()
    {
        $data['kategoris'] = $this->getKategori();
        return view('admin.kategori.index')->with($data);
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
            'nama_kategori' => 'unique:kategoris,nama_kategori',
        ]);
        try {
            Kategori::create($request->all());
        $notification = [
            'alert-type' => 'success',
            'message' => 'Berhasil Menambah Kategori',
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
    public function show(string $id){
        $data['kategori'] = $this->getOneKategori($id);
        return view('admin.kategori.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->getOneKategori($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required',
        ]);
        try {
            $update = $request->except('_token', '_method');
            $this->getOneKategori($id)->update($update);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Update Berhasil',
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
    public function destroy(string $id)
    {
        try {
            $this->getOneKategori($id)->delete();
            $notification = [
                'alert-type' => 'success',
                'message' => 'Berhasil Menghapus',
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
