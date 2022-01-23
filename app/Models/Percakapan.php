<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percakapan extends Model
{
    use HasFactory;

    // relasi ke pesan
    public function Pesan()
    {
        return $this->belongsTo(Pesan::class);
    }

    public function Pengirim()
    {
        return $this->belongsTo(User::class);
    }

    public function Penerima()
    {
        return $this->belongsTo(User::class);
    }
}
