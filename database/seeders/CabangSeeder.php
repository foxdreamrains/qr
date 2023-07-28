<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabang::create([
            'nama_kota' => 'Cabang Jakarta'
        ]);

        Cabang::create([
            'nama_kota' => 'Cabang Depok'
        ]);

        Cabang::create([
            'nama_kota' => 'Cabang Bogor'
        ]);

        Cabang::create([
            'nama_kota' => 'Cabang Bekasi'
        ]);

        Cabang::create([
            'nama_kota' => 'Cabang Tanggerang'
        ]);
    }
}
