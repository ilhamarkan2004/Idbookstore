<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('halaman');
            $table->integer('stok');
            $table->date('tanggal_terbit');
            $table->unsignedBigInteger('kategori_id');
            $table->string('bahasa');
            $table->enum('tipe', array('gratis', 'berbayar'));
            $table->string('penerbit');
            $table->string('flipbook')->default('');
            $table->string('isbn');
            $table->double('berat');
            $table->double('lebar');
            $table->double('panjang');
            $table->double('harga');
            $table->text('deskripsi');
            $table->string('fotobuku');
            $table->string('epub')->default('');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('kontributors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('buku_id');
            $table->enum('kategori', array('penulis', 'editor', 'design_cover', 'layout'));
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->timestamps();
        });
        // Schema::create('pembelians', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('user_id'); // Tambah kolom untuk pengguna
        //     $table->unsignedBigInteger('buku_id'); // Tambah kolom untuk buku yang dibeli
        //     // $table->string('metode_pembayaran'); // Tambah kolom untuk metode pembayaran (misalnya, "Midtrans")
        //     $table->double('harga');
        //     $table->enum('status', ['Unpaid', 'Paid']);
        //     $table->timestamps();

        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
        // });

        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->string('no_keranjang');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('total_harga')->default(0);
            $table->enum('status', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->timestamps();
        });
        Schema::create('detail_keranjangs', function (Blueprint $table) {
            $table->unsignedBigInteger('keranjang_id');
            $table->unsignedBigInteger('buku_id');
            $table->integer('jumlah');
            $table->double('total_harga')->default(0);
            $table->foreign('keranjang_id')->references('id')->on('keranjangs')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->primary(['keranjang_id', 'buku_id']);
            $table->timestamps();
        });

        Schema::create('pembelian_bukus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('buku_id');
            $table->dateTime('tanggal_pembelian');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
        });


        // Tabel transaksis
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('no_keranjang')->unique();
            $table->unsignedBigInteger('user_id');
            $table->double('total_harga')->default(0);
            $table->enum('status', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Tabel detail_transaksis
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('buku_id');
            $table->integer('jumlah');
            $table->double('total_harga')->default(0);

            $table->primary(['transaksi_id', 'buku_id']);
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
        });
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rating'); // Rating dari pengguna (misal: 1-5)
            $table->text('deskripsi'); // Deskripsi ulasan
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
