<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class BlogIndex extends Component
{
    public $name, $body, $selected_id;

    // kondisi modal edit dan add modal 
    public $showModalEdit = false;

    protected $listeners = ['delete'];

    public function render()
    {
        return view('livewire.blog-index', [
            'blog' => Blog::latest()->get()
        ]);
    }


    /// Modal And Function for ADD
    public function add()
    {
        $this->showModalEdit = false;

        // agar form nya default kosong
        $this->name = [];
        $this->body = [];

        $this->dispatchBrowserEvent('show-modal');
    }

    // Add Blog
    public function createBlog()
    {
       $this->validate([
                'name' => 'required',
                'body' => 'required'
        ]);

        Blog::create([
            'name' => $this->name,
            'body' => $this->body
        ]);

        // Hide Modal
        $this->dispatchBrowserEvent('hide-modal');

        // Sweet Alert
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'text' => 'Data Berhasil Ditambahkan'
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $record = Blog::findOrFail($id);
        $this->selected_id = $id;

        $this->name = $record->name;
        $this->body = $record->body;

        $this->showModalEdit = true;  
        $this->dispatchBrowserEvent('show-modal');
    }

   public function updateBlog()
   {
        $this->validate([
                'selected_id' => 'required|numeric',
                'name' => 'required',
                'body' => 'required'
        ]);

        if($this->selected_id) {
            $record = Blog::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'body' => $this->body,
            ]);
        }

        $this->dispatchBrowserEvent('hide-modal');

         // Sweet Alert
         $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'info',
            'text' => 'Data Berhasil Diedit'
        ]);

   }

   public function deleteConfirm($id)
    {
        // Confirm Alert
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'icon' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id
        ]);
   }

   public function delete($id)
   {
       Blog::where('id', $id)->delete();
   }

}
