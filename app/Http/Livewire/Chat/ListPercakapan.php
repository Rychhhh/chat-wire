<?php

namespace App\Http\Livewire\Chat;

use App\Models\Percakapan;
use App\Models\Pesan;
use Livewire\Component;

class ListPercakapan extends Component
{
    // variable pesan dikiri
    public $pilihanPesan;
    
    // variable untuk mengirim pesan di form pesan
    public $body;

    // agar bisa akses pesan  method foreach in line 73 
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

    public function isiChat()
    {
        Pesan::create([
            'percakapans_id' => $this->pilihanPesan->id,
            'users_id' => auth()->id(),
            'body' => $this->body
        ]);

        $this->reset('body');

        return redirect('pesan');
    }


    // view list percakapan
    public function render()
    {
        $percakapans = Percakapan::query()
        ->where('penerima_id', auth()->id())
        ->orWhere('pengirim_id', auth()->id())
        ->get();

            


       return view('livewire.chat.list-percakapan', [
            'percakapans' => $percakapans
        ]);
    }
}
