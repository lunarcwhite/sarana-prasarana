<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranaPrasarana;
use App\Models\Kategori;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $data['kategoris'] = Kategori::orderBy('nama_kategori', 'asc')->get();
        $data['queryKategori'] = $request->kategori;
        $data['queryKeyword'] = $request->keyword;
        if($request->filled('kategori')) {
            $kategori = Kategori::where('nama_kategori', $request->kategori)->first();
            $data['saranaPrasarana'] = SaranaPrasarana::where('kategori_id', $kategori->id)->orderBy('nama_sarana_prasarana','asc')->get();
        }elseif($request->filled('keyword') && $request->keyword != ''){
            $data['saranaPrasarana'] = SaranaPrasarana::where('nama_sarana_prasarana','LIKE', "%$request->keyword%")->orderBy('nama_sarana_prasarana','asc')->get();
        }else{
            $data['saranaPrasarana'] = SaranaPrasarana::orderBy('nama_sarana_prasarana','asc')->paginate(10);
        }
        return view('landing_page.index')->with($data);
    }
}
