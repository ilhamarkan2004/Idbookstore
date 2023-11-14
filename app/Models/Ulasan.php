<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
     protected $protected = [
        'id'
    ];

    // Relasi dengan buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    // Relasi dengan pengguna (user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
