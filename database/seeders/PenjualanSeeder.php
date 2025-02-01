<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjualan::create([
            'nama_pembeli' => 'Audy',
            'nama_pakaian' => 'Kaos Polos',
            'jumlah' => 2,
            'harga' => 50000
        ]);

        Penjualan::create([
            'nama_pembeli' => 'Ruslan',
            'nama_pakaian' => 'Celana Jeans',
            'jumlah' => 1,
            'harga' => 150000
        ]);
    }
}
