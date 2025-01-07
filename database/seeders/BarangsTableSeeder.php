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
           ['nama_barang'=>'Kursi', 'merek'=>'Ikea', 'harga'=>175000],
           ['nama_barang'=>'Meja', 'merek'=>'Ikea', 'harga'=>200000],
           ['nama_barang'=>'Pintu', 'merek'=>'Ikea', 'harga'=>150000],
           ['nama_barang'=>'Gelas', 'merek'=>'Hensworth', 'harga'=>75000],
           ['nama_barang'=>'Pirirng', 'merek'=>'Hensworth', 'harga'=>90000]
        ];

        DB::table('barangs')->insert($barangs);
    }
}
