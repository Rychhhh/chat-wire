<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogCreate extends Component
{
    public $name;
    public $body;

    public function render()
    {
        return view('livewire.blog-create');
    }

    public function store()
    {
        Blog::create([
            'name' => $this->name,
            'phone' => $this->phone
        ]);
    }
}
