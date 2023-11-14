<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kategoris = Kategori::with('buku')->get();
        return view('admin.kategori.index',[
            'kategoris'=>$kategoris
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
          return view('admin.kategori.create');
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
            'nama' => 'required|string',
        
        ]);
        $kategori = new Kategori();
        $kategori->nama = $validateData['nama'];
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
          if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        return view('admin.kategori.edit',[
            'kategori'=>$kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $validateData = $request->validate([
            'nama' => 'required|string',
        
        ]);
        $kategori->update($validateData);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
