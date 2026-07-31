<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@lab.test',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa'
        ]);
        User::create([
            'name' => 'Admin Lab',
            'email' => 'admin@lab.test',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Kepala Lab',
            'email' => 'kepala@lab.test',
            'password' => bcrypt('password'),
            'role' => 'kepala_lab'
        ]);
    }
}
