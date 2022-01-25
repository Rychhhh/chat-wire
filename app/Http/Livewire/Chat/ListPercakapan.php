<?php

namespace App\Http\Livewire\Chat;

use App\Models\Percakapan;
use Livewire\Component;

class ListPercakapan extends Component
{
    public $pilihanPesan;

    // agar bisa akses pesan method in line 73 
    public function mount()
    {
        $this->pilihanPesan = Percakapan::query()->first();
    }

    // melihat pesan setiap user 
    public function viewPesan($pesanId)
    {
        // get id
        $this->pilihanPesan = Percakapan::findOrFail($pesanId);

    }


    // view list percakapan
    public function render()
    {
        $percakapans = Percakapan::query()
        ->get();


        // dd($percakapans);

       return view('livewire.chat.list-percakapan', [
            'percakapans' => $percakapans
        ]);
    }
}
