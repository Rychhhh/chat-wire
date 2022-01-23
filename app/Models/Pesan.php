<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    public function Percakapan()
    {
        return $this->belongsTo(Percakapan::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
