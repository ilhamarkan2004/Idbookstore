<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Keranjang;
use App\Models\DetailKeranjang;
use App\Models\Buku;
use App\Models\PembelianBuku;
use Illuminate\Support\Facades\Gate;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
if (!Gate::allows('is-admin')) {
        abort(403);
    }
        $transaksis = Transaksi::with('user')->get();

        return view('admin.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        
    if (!Gate::allows('is-admin')) {
        abort(403);
    }
   
    // Dapatkan daftar buku dari DetailTransaksi terkait dengan transaksi yang dipilih
    $books = $transaksi->detailTransaksis()->with('buku')->get()->pluck('buku');



    // Tampilkan view dengan data buku
    return view('admin.transaksi.show', compact('books'));

   

    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
