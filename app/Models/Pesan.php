<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesans';

    // setiap pesan memiliki 1 percakapan
    public function percakapan()
    {
        return $this->belongsTo(Percakapan::class);
    }

    // setiap pesan memiliki 1 id 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
