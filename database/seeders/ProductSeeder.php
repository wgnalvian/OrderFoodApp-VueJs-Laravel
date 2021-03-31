<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
            'kode' => 'K-01',
            'nama' => 'Sate Ayam',
            'harga' => '16000',
            'is_ready' => "1",
            'gambar' => "sate-ayam.jpg",
        ],
        [
            'kode' => 'K-02',
            'nama' => 'Nasi Goreng Telur',
            'harga' => '14000',
            'is_ready' => "1",
            'gambar' => "nasi-goreng-telor.jpg",
        ],
        [
            'kode' => 'K-03',
            'nama' => 'Nasi Rames',
            'harga' => '12000',
            'is_ready' => "1",
            'gambar' => "nasi-rames.jpg",
        ],
        [
            'kode' => 'K-04',
            'nama' => 'Mie Ayam Bakso',
            'harga' => '14000',
            'is_ready' => "1",
            'gambar' => "mie-ayam-bakso.jpg",
        ],
        [
            'kode' => 'K-05',
            'nama' => 'Mie Goreng',
            'harga' => '13000',
            'is_ready' => "1",
            'gambar' => "mie-goreng.jpg",
        ],
        [
            'kode' => 'K-06',
            'nama' => 'Pangsit 6 pcs',
            'harga' => '14000',
            'is_ready' => "1",
            'gambar' => "pangsit.jpg",
        ],
        [
            'kode' => 'K-07',
            'nama' => 'Kentang Goreng',
            'harga' => '14000',
            'is_ready' => "1",
            'gambar' => "kentang-goreng.jpg",
        ],
        [
            'kode' => 'K-08',
            'nama' => 'Bakso',
            'harga' => '10000',
            'is_ready' => "1",
            'gambar' => "bakso.jpg",
        ],
        [
            'kode' => 'K-09',
            'nama' => 'Lontong Opor Ayam',
            'harga' => '14000',
            'is_ready' => "1",
            'gambar' => "lontong-opor-ayam.jpg",
        ],
        

        
    
    
    );
    }
}
