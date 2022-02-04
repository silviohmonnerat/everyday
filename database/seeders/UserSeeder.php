<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Silvio Monnerat",
            'email' => 'silviomonnerat@gmail.com',
            'password' => Hash::make('q1w2e3r4'),
        ]);

        DB::table('users')->insert([
            'name' => "Fabricia Ramos",
            'email' => 'fabricia@ofora.org',
            'password' => Hash::make('q1w2e3r4'),
        ]);
    }
}
