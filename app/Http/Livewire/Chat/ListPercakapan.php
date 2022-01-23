<?php

namespace App\Http\Livewire\Chat;

use App\Models\Percakapan;
use App\Models\Pesan;
use Livewire\Component;

class ListPercakapan extends Component
{
    public function render()
    {
        $percakapans = Percakapan::query()
        // ->where('pengirim_id', auth()->id())
        // ->orWhere('penerima_id', auth()->id())
        ->get();



        return view('livewire.chat.list-percakapan', [
            'percakapans' => $percakapans
        ]);
    }
}
