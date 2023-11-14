<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $books = Buku::with('kategori')->get();
        return view('admin.buku.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kategoris = Kategori::with('buku')->get();
        return view('admin.buku.create', [
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $validateData = $request->validate([
            'judul' => 'required|string',
            'halaman' => 'required|integer',
            'stok' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'kategori_id' => 'required|integer',
            'bahasa' => 'required|string',
            'tipe' => 'required|string',
            'penerbit' => 'required|string',
            'flipbook' => 'nullable|string',
            'isbn' => 'required|string',
            'berat' => 'required|integer',
            'lebar' => 'required|integer',
            'panjang' => 'required|integer',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'fotobuku' => 'required|image|mimes:png,jpg,jpeg,svg',
            'epub' => 'nullable|mimes:epub',
        ]);
        $buku = new Buku();
        $buku->judul = $validateData['judul'];
        $buku->halaman = $validateData['halaman'];
        $buku->stok = $validateData['stok'];
        $buku->kategori_id = $validateData['kategori_id'];
        $buku->tanggal_terbit = $validateData['tanggal_terbit'];
        $buku->flipbook = $validateData['flipbook'];
        $buku->penerbit = $validateData['penerbit'];
        $buku->bahasa = $validateData['bahasa'];
        $buku->tipe = $validateData['tipe'];
        $buku->isbn = $validateData['isbn'];
        $buku->berat = $validateData['berat'];
        $buku->lebar = $validateData['lebar'];
        $buku->panjang = $validateData['panjang'];
        $buku->harga = $validateData['harga'];
        $buku->deskripsi = $validateData['deskripsi'];

        if ($request->File('fotobuku')) {
            $buku->fotobuku = $request->file('fotobuku')->store('fotobuku');
        }
        if ($request->File('epub')) {
            $buku->epub = $request->file('epub')->store('epub');
        }

        $buku->save();
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kategoris = Kategori::with('buku')->get();
        return view('admin.buku.edit', [
            'buku' => $buku,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {

        if (!(Gate::allows('is-admin'))) {
            abort(403);
        }

        $validateData = $request->validate([
            'judul' => 'required|string',
            'halaman' => 'required|integer',
            'stok' => 'required|integer',
            'tanggal_terbit' => 'required|date',
            'kategori_id' => 'required|integer',
            'bahasa' => 'required|string',
            'tipe' => 'required|string',
            'penerbit' => 'required|string',
            'flipbook' => 'nullable|string',
            'isbn' => 'required|string',
            'berat' => 'required|integer',
            'lebar' => 'required|integer',
            'panjang' => 'required|integer',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'fotobuku' => 'required|image|mimes:png,jpg,jpeg,svg',
            'epub' => 'mimes:epub',
        ]);

        if ($request->hasFile('fotobuku')) {
            // Hapus foto lama jika ada
            if ($buku->fotobuku) {
                Storage::delete($buku->fotobuku);
            }
            $validateData['fotobuku'] = $request->file('fotobuku')->store('fotobuku');
        }

        if ($request->hasFile('epub')) {
            // Hapus file EPUB lama jika ada
            if ($buku->epub) {
                Storage::delete($buku->epub);
            }
            $validateData['epub'] = $request->file('epub')->store('epub');
        }


        $buku->fill($validateData);
        $buku->save();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        // Hapus file ePub dan foto buku dari storage
        if ($buku->epub) {
            Storage::delete($buku->epub);
        }

        if ($buku->fotobuku) {
            Storage::delete($buku->fotobuku);
        }
        $buku->delete();

        return redirect()->route('buku.index');
    }
}
