<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    if ((Gate::allows('is-admin'))) {
        abort(403);
    }

    $kategori = Kategori::get();

    // Get the selected categories from the request
    $selectedCategories = $request->input('categories', []);

    // If it's a string, convert it to an array
    if (!is_array($selectedCategories)) {
        $selectedCategories = explode(',', $selectedCategories);
    }

    // Get the selected price filter from the request
    $priceFilter = $request->input('pricefilter');

    $query = Buku::with('kategori');

    // Apply category filter
    if (!empty($selectedCategories)) {
        $query->whereHas('kategori', function ($q) use ($selectedCategories) {
            $q->whereIn('nama', $selectedCategories);
        });
    }

    // Apply price filter
    if ($priceFilter) {
        if ($priceFilter === 'lowtohigh') {
            $query->orderBy('harga', 'asc');
        } elseif ($priceFilter === 'hightolow') {
            $query->orderBy('harga', 'desc');
        }
    }

    // Apply search filter
    if ($search = $request->input('search')) {
        $query->where('judul', 'like', '%' . $search . '%');
    }

    // Get the filtered books
    $buku = $query->get();

    return view('market', [
        'buku' => $buku,
        'kategoris' => $kategori,
        'selectedCategories' => $selectedCategories, // Pass the selected categories to the view
        'selectedPriceFilter' => $priceFilter // Pass the selected price filter to the view
    ]);
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
 public function show($id)
{
    $buku = Buku::with('kontributor')->where('id', $id)->first();

    if (!$buku) {
        return redirect()->back();
    }

    // Mengambil hanya kontributor yang terkait dengan buku ini
    $penulis = $buku->kontributor->where('kategori', 'penulis');
    $editor = $buku->kontributor->where('kategori', 'editor');
    $designCover = $buku->kontributor->where('kategori', 'design_cover');
    $layout = $buku->kontributor->where('kategori', 'layout');

    // Retrieve reviews for this book
    $ulasans = Ulasan::where('buku_id', $id)->get();

    return view('detailbuku', [
        'buku' => $buku,
        'penulis' => $penulis,
        'editor' => $editor,
        'designCover' => $designCover,
        'layout' => $layout,
        'reviews' => $ulasans, // Pass reviews to the view
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
