<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangs = [
            ['nama_barang'=>'laptop', 'merk'=>'lenovo', 'harga'=>10000000],
            ['nama_barang'=>'motor', 'merk'=>'honda', 'harga'=>35000000],
            ['nama_barang'=>'mobil', 'merk'=>'bmw', 'harga'=>150000000],
            ['nama_barang'=>'kulkas', 'merk'=>'polytron', 'harga'=>3000000],
            ['nama_barang'=>'tv', 'merk'=>'samsung', 'harga'=>5000000],
        ];
        //masukan data ke database
        DB::table('barangs')->insert($barangs);
    }
}
