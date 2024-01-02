<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //memasukan data dummy
        $kategoriData = [
            [
                'nama_kategori'=> 'Minuman',
            ],
            [
                'nama_kategori'=> 'Snack',
            ],
            [
                'nama_kategori'=> 'Makanan',
            ],

        ];

        foreach($kategoriData as $key => $val){
            Kategori::create($val);
        }

    }
}
