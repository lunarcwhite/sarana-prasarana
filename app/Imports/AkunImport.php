<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;

class AkunImport implements WithValidation, WithHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;
    public function model(array $row)
    {
        $password = 'gbghfd65#2w45' . $row['password'] . 'sdghgh^$^';
        return new User([
            'username' => $row['username'],
            'email' => $row['email'],
            'nama_akun' => $row['nama_akun'],
            'role_id' => 2,
            'password' => bcrypt($password)
        ]);
    }
    public function rules(): array
    {
        return [
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'nama_akun' => 'required|unique:users,nama_akun',
        ];
    }
}
