<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

   public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
