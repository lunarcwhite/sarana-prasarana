<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\SaranaPrasarana;

class DashboardController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::count();
        $data['sarana'] = SaranaPrasarana::where('tipe', 'Sarana')->count();
        $data['prasarana'] = SaranaPrasarana::where('tipe', 'Prasarana')->count();
        return view('admin.dashboard.index')->with($data);
    }
}
