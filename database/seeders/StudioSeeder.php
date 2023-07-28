<?php

namespace Database\Seeders;

use App\Models\Studios;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Studios::create([
            'nama_studio' => 'Studio 1',
            'cabangs_id' => 1,
            'tgl' => Carbon::now(),
            'jam_mulai' => Carbon::now()->format('H:i:s'),
            'jam_selesai' => Carbon::now()->format('H:i:s')
        ]);

        Studios::create([
            'nama_studio' => 'Audit 1',
            'cabangs_id' => 2,
            'tgl' => Carbon::now(),
            'jam_mulai' => Carbon::now()->format('H:i:s'),
            'jam_selesai' => Carbon::now()->format('H:i:s')
        ]);

        Studios::create([
            'nama_studio' => 'Studio 2',
            'cabangs_id' => 1,
            'tgl' => Carbon::now(),
            'jam_mulai' => Carbon::now()->format('H:i:s'),
            'jam_selesai' => Carbon::now()->format('H:i:s')
        ]);

        Studios::create([
            'nama_studio' => 'Audit 2',
            'cabangs_id' => 2,
            'tgl' => '2023-07-20',
            'jam_mulai' => Carbon::now()->format('H:i:s'),
            'jam_selesai' => Carbon::now()->format('H:i:s')
        ]);
    }
}
