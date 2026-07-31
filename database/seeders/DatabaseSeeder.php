<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'name' => 'Admin Lab',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Akun Kepala Lab
        User::create([
            'name' => 'Pak Kepala',
            'email' => 'kepala@test.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_lab',
        ]);

        // 3. Akun Mahasiswa
        User::create([
            'name' => 'Mahasiswa 1',
            'email' => 'mhs@test.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
        $this->call(ItemSeeder::class);
        // User::factory(10)->create();
        // $this->call(UserSeeder::class);
        // $this->call([
        //     ItemSeeder::class,
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
