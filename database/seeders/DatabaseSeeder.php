<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'pristine@mail.com',
            'username' => 'pristine',
            'password' => Hash::make('pristine!234')
        ]);

        $this->call(CabangSeeder::class);
        $this->call(StudioSeeder::class);
    }
}
