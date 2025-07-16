<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "1A",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "2A",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "3A",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "1B",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "2B",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "3B",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "1C",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "2C",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "3C",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "1D",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "2D",
        ]);
        \App\Models\Kelompok::create([
            'id_kelompok' => Str::upper(Str::random(20)),
            'nama_kelompok' => "3D",
        ]);

        \App\Models\User::create([
            'id_user' => Str::upper(Str::random(20)),
            'npm' => "123456",
            'username' => 'admin',
            'password' => Hash::make('admin#123'),
            'nama_lengkap' => 'Admin Filament',
            'email' => 'admin@gmail.com',
            'peran' => 'admin'
        ]);

        \App\Models\User::create([
            'id_user' => Str::upper(Str::random(20)),
            'npm' => "2315061113",
            'username' => 'zachriek',
            'password' => Hash::make('zachriek#123'),
            'nama_lengkap' => 'Muhammad Zachrie Kurniawan',
            'email' => 'zachriek@gmail.com',
            'peran' => 'user'
        ]);

        \App\Models\User::create([
            'id_user' => Str::upper(Str::random(20)),
            'npm' => "2315061029",
            'username' => 'mrobbi',
            'password' => Hash::make('mrobbi#123'),
            'nama_lengkap' => 'Muhammad Robbani Narsam',
            'email' => 'mrobbi@gmail.com',
            'peran' => 'user'
        ]);

        \App\Models\User::create([
            'id_user' => Str::upper(Str::random(20)),
            'npm' => "2315061085",
            'username' => 'hira',
            'password' => Hash::make('hira#123'),
            'nama_lengkap' => 'Lutfiya Fakhira',
            'email' => 'hira@gmail.com',
            'peran' => 'user'
        ]);

        \App\Models\User::create([
            'id_user' => Str::upper(Str::random(20)),
            'npm' => "2355061005",
            'username' => 'anggun',
            'password' => Hash::make('anggun#123'),
            'nama_lengkap' => 'Anggun Azqiyah Azzahra',
            'email' => 'anggun@gmail.com',
            'peran' => 'user'
        ]);

        \App\Models\Praktikum::create([
            'id_praktikum' => Str::upper(Str::random(20)),
            'nama_praktikum' => "Teknik Digital",
            'slug' => Str::slug("Teknik Digital"),
        ]);
        \App\Models\Praktikum::create([
            'id_praktikum' => Str::upper(Str::random(20)),
            'nama_praktikum' => "Embedded System",
            'slug' => Str::slug("Embedded System"),
        ]);
        \App\Models\Praktikum::create([
            'id_praktikum' => Str::upper(Str::random(20)),
            'nama_praktikum' => "Elektronika Digital",
            'slug' => Str::slug("Elektronika Digital"),
        ]);
    }
}
