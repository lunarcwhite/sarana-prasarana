<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\AkunImport;
use Excel;

class KelolaAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['akuns'] = User::orderBy('nama_akun')->get();
        return view('admin.akun.index')->with($data);
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
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'nama_akun' => 'required|unique:users,nama_akun',
            'password' => 'required'
        ]);
        try {
            $input = $request->all();
            $password = 'gbghfd65#2w45' . $request->password . 'sdghgh^$^';
            $input['role_id'] = 2;
            $input['password'] = bcrypt($password);
            User::create($input);
            $notification = [
                'alert-type' => 'success',
                'message' => 'Berhasil Menambahakan'
            ];
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal menambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        return User::where('id', $id)->first()->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validate = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'nama_akun' => 'required',
            'password' => 'required'
        ]);
        try {
            $input = $request->except('_method', '_token');
            $password = 'gbghfd65#2w45' . $request->password . 'sdghgh^$^';
            $input['role_id'] = 2;
            $input['password'] = bcrypt($password);
            User::where('id',$id)->update($input);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Gagal Memperbarui!');
        }
        $notification = [
            'alert-type' => 'success',
            'message' => 'Berhasil Memperbarui!'
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            User::where('id',$id)->delete();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withErrors('Tidak dapat menghapus akun, ada data yang terhubung!');
        }
        $notification = [
            'alert-type' => 'success',
            'message' => 'Berhasil Menghapus Akun!'
        ];
        return redirect()->back()->with($notification);
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new AkunImport, $request->file('import'));
            $notification = [
                'alert-type' => 'success',
                'message' => 'Import Akun Berhasil'
            ];
            return redirect()->back()->with($notification);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             return redirect()->back()->withErrors($failures);
        }
    }
}
