<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_lengkap'      => 'Gisellma Firmansyah',
            'email'      => 'gisellmaf@gmail.com',
            'username'  => 'icell',
            'alamat'      => 'Jakarta',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'nama_lengkap'      => 'Mikeyy',
            'email'      => 'mikey@gmail.com',
            'username'  => 'mikey',
            'alamat'      => 'Jepang',
            'password' => bcrypt('1234'),
        ]);
    }
}
