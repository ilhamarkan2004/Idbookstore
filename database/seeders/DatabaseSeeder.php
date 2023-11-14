<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = Kategori::factory()->create([
            'nama' => 'keren'
        ]);
        $admin = Kategori::factory()->create([
            'nama' => 'hura'
        ]);
        $admin = User::factory()->create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'role' => 'admin',

        ]);
        $admin = User::factory()->create([
            'email' => 'ilhamarkan2004@gmail.com',
            'name' => 'Mohammad Ilham Arkan',
            'role' => 'customer',
        ]);
        $admin = User::factory()->create([
            'email' => 'ilhamarkan2004@student.ub.ac.id',
            'name' => 'Akun UB',
            'role' => 'customer',
        ]);
        $admin = Kategori::factory()->create([
            'nama' => 'Sembako'
        ]);
        $randomTimestamp = mt_rand(strtotime('2000-01-01'), strtotime('2023-12-31'));
        $tanggalTerbit = date('Y-m-d', $randomTimestamp);
        $admin = Buku::factory()->create([
            'judul' => 'Buku 1',
            'halaman' => 14,
            'stok' => 10,
            'tanggal_terbit' => $tanggalTerbit,
            'kategori_id' => 1,
            'bahasa' => 'inggris',
            'tipe' => 'Berbayar',
            'penerbit' => 'CV. Penulis Cerdas Indonesia',
            'flipbook' => 'gaada',
            'isbn' => 'dfgdfg345',
            'berat' => 15,
            'lebar' => 15,
            'panjang' => 15,
            'harga' => 10000,
            'deskripsi' => 'dsfsdfsdfsdf',
            'fotobuku' => 'gaada',
            'epub' => '',
        ]);
        $admin = Buku::factory()->create([
            'judul' => 'Buku 2',
            'halaman' => 14,
            'stok' => 10,
            'tanggal_terbit' => $tanggalTerbit,
            'kategori_id' => 1,
            'bahasa' => 'inggris',
            'tipe' => 'Berbayar',
            'penerbit' => 'CV. Penulis Cerdas Indonesia',
            'flipbook' => 'gaada',
            'isbn' => 'dfgdfg345',
            'berat' => 15,
            'lebar' => 15,
            'panjang' => 15,
            'harga' => 1500,
            'deskripsi' => 'dsfsdfsdfsdf',
            'fotobuku' => 'gaada',
            'epub' => '',
        ]);

        $admin = Buku::factory()->create([
            'judul' => 'Buku 3',
            'halaman' => 14,
            'stok' => 10,
            'tanggal_terbit' => $tanggalTerbit,
            'kategori_id' => 1,
            'bahasa' => 'inggris',
            'tipe' => 'Berbayar',
            'penerbit' => 'CV. Penulis Cerdas Indonesia',
            'flipbook' => 'gaada',
            'isbn' => 'dfgdfg345',
            'berat' => 15,
            'lebar' => 15,
            'panjang' => 15,
            'harga' => 1500,
            'deskripsi' => 'dsfsdfsdfsdf',
            'fotobuku' => 'gaada',
            'epub' => '',
        ]);

        $admin = Buku::factory()->create([
            'judul' => 'Buku 4',
            'halaman' => 14,
            'stok' => 10,
            'tanggal_terbit' => $tanggalTerbit,
            'kategori_id' => 1,
            'bahasa' => 'inggris',
            'tipe' => 'Berbayar',
            'penerbit' => 'CV. Penulis Cerdas Indonesia',
            'flipbook' => 'gaada',
            'isbn' => 'dfgdfg345',
            'berat' => 15,
            'lebar' => 15,
            'panjang' => 15,
            'harga' => 1500,
            'deskripsi' => 'dsfsdfsdfsdf',
            'fotobuku' => 'gaada',
            'epub' => '',
        ]);

        $admin = Buku::factory()->create([
            'judul' => 'Buku 5',
            'halaman' => 14,
            'stok' => 10,
            'tanggal_terbit' => $tanggalTerbit,
            'kategori_id' => 1,
            'bahasa' => 'inggris',
            'tipe' => 'Berbayar',
            'penerbit' => 'CV. Penulis Cerdas Indonesia',
            'flipbook' => 'gaada',
            'isbn' => 'dfgdfg345',
            'berat' => 15,
            'lebar' => 15,
            'panjang' => 15,
            'harga' => 1500,
            'deskripsi' => 'dsfsdfsdfsdf',
            'fotobuku' => 'gaada',
            'epub' => '',
        ]);
    }
}
