<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // date_default_timezone_set('Africa/Kampala');
        // $time = date('h:i A', strtotime('+0 HOURS'));
        DB::table('users')->insert([
            'user_id' => 1,
            'email' => 'tallen@tallen.tech',
            'password' => Hash::make('admin'),
            'name' => 'Tallen Technologyies',
            // 'datehire' => $time,
            'role' => 'admin',
            'status' => 'OFFLINE',
        ]);
    }
}
