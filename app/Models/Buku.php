<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function kontributor(){
        return $this->hasMany(Kontributor::class);
    }
     public function pembelianBuku()
    {
        return $this->hasMany(PembelianBuku::class, 'buku_id');
    }
     public function ulasans()
    {
        return $this->hasMany(Ulasan::class, 'buku_id');
    }
}
