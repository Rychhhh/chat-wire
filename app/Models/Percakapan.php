<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Percakapan extends Model
{
    use HasFactory;

    protected $table = 'percakapans';

    // hasMany = menitipkan atau memberi id ke table yang di hasMany
    // belongsTo = dititipkan atau mengambil id table lain  dari table yang di belongsTo
     
    // penjelasan tag dibawah
    // jadi model percakapan ini menitipkan id ke ->  model pesan
    // dan function pesan dibawah itu berguna saat looping di view list-percakapan ( coba cek ) 
    
    // dan fungsi pengirim() dan penerima() berguna untuk mengambil setiap id percakapan

    // setiap percakapan mempunyai banyak pesan ( hasMany )
    public function pesan()
    {
        return $this->hasMany(Pesan::class, 'percakapans_id');
    }

    // setiap percakapan mempunyai 1 id pengirim
    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    // setiap percakapan mempunyai 1 id penerima
    public function penerima()
    {
        return $this->belongsTo(User::class, 'penerima_id');
    }
}
