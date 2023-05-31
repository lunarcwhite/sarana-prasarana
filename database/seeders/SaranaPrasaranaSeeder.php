<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SaranaPrasarana;
use Faker\Factory as faker;
use App\Models\Kategori;

class SaranaPrasaranaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 20; $i++) { 
            $kategori = Kategori::inRandomOrder()->first();
            $data = [
                'nama_sarana_prasarana' => 'barang-10'.$i+1,
                'tipe' => $faker->randomElement(['Sarana', 'Prasarana']),
                'kategori_id' => $kategori->id,
                'jumlah' => rand(1, 99),
            ];
            SaranaPrasarana::create($data);
        }
    }
}
