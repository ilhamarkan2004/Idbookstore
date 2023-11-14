<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    if (Gate::allows('is-admin')) {
        abort(403);
    }

    $validateData = $request->validate([
        'rating' => 'required|integer',
        'deskripsi' => 'required|string',
        'buku_id' => 'required|integer'
    ]);

    $userId = Auth::user()->id;
    $bukuId = $validateData['buku_id'];

    // Mendapatkan data buku berdasarkan $bukuId
    $buku = Buku::find($bukuId);

    if (!$buku) {
        return redirect()->back()->with('error', 'Buku tidak ditemukan.');
    }

    // Cek apakah pengguna sudah memberikan ulasan untuk buku ini
    $existingReview = Ulasan::where('user_id', $userId)
        ->where('buku_id', $bukuId)
        ->first();

    if ($existingReview) {
        return redirect()->back()->with('error', 'Anda sudah memberikan ulasan untuk buku ' . $buku->judul . '.');
    }

    // Jika pengguna belum memberikan ulasan, simpan ulasan yang baru
    $ulasan = new Ulasan();
    $ulasan->rating = $validateData['rating'];
    $ulasan->deskripsi = $validateData['deskripsi'];
    $ulasan->user_id = $userId;
    $ulasan->buku_id = $bukuId;
    $ulasan->save();

    return redirect()->back()->with('success', 'Berhasil menambahkan ulasan buku ' . $buku->judul .'.');
}




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
