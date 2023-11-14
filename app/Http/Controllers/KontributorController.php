<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kontributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KontributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kontributors = Kontributor::get();
        return view('admin.kontributor.index',[
            'kontributors'=>$kontributors,
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
        $bukus = Buku::with('kategori')->get();
          return view('admin.kontributor.create',[
          'bukus' => $bukus
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request, Buku $buku)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
          $validateData = $request->validate([
            'nama' => 'required|string',
            'buku_id' => 'required|integer',
            'kategori' => 'required|string',
            
        
        ]);
        $kontributor = new Kontributor();
        $kontributor->nama = $validateData['nama'];
        $kontributor->buku_id = $validateData['buku_id'];
        $kontributor->kategori = $validateData['kategori'];
        $kontributor->save();
        return redirect()->route('kontributor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontributor $kontributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontributor $kontributor)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
         $bukus = Buku::with('kategori')->get();
        return view('admin.kontributor.edit',[
            'kontributor'=>$kontributor,
            'bukus'=>$bukus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontributor $kontributor)
    {
          if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $validateData = $request->validate([
            'nama' => 'required|string',
             'buku_id' => 'required|integer',
            'kategori' => 'required|string',
        
        ]);
        $kontributor->update($validateData);
        return redirect()->route('kontributor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Kontributor $kontributor)
    {
         if (!(Gate::allows('is-admin'))) {
            abort(403);
        }
        $kontributor->delete();

        return redirect()->back();
    }
}
