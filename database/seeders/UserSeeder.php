<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas',
            'username' => 'petugas',
            'email' => 'petugas@user.com',
            'password' => bcrypt('petugas123'),
            'role' => 'petugas',
        ]);

        User::create([
            'nik' => '3313101010100000',
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user123'),
            'role' => 'user',
        ]);
    }
}
