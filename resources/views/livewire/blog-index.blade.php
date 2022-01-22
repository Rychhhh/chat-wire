<div>
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Table CRUD</h1>

        {{-- Modal Show --}}
        <button type="button" wire:click.prevent='add' class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add Blog</button>
      </div>
   
    <hr>
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="dataTable_length">
              <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                <option value="10">10</option><option value="25">25</option>
                <option value="50">50</option><option value="100">100</option>
              </select> entries</label>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div id="dataTable_filter" class="dataTables_filter">
              <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
          <table class="table table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
          <thead>
            <tr role="row">
              <th>No</th>
              <th>Name</th>
              <th>Body</th>
              <th colspan="3">Action</th>
          </thead>
          <tfoot>
            <th>No</th>
            <th>Name</th>
            <th>Body</th>
            <th>Action</th>
            <tbody>    
            @foreach ($blog as $item)
            <tr class="odd">
              <td class="sorting_1">{{ $loop->iteration }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->body }}</td>
              <td>
                <button wire:click.prevent="edit({{ $item->id }})"  class="btn btn-info" ></button>
                <button wire:click.prevent="deleteConfirm({{ $item->id }})" class="btn btn-danger mt-2">Delete</button>
              </td>
            </tr>   
            @endforeach          
            </tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade modal-dialog-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">

       <form autocomplete="off" wire:submit.prevent="{{ $showModalEdit ? 'updateBlog' : 'createBlog' }}">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                  @if ($showModalEdit)
                      Edit Blog Modal
                  @else
                      Add Blog Modal
                  @endif

                </h5>
                <a type="button" href="{{ url('livewire') }}" class="btn-close">X</a>
             </div>
             <div class="modal-body">
                <form>
                   <div class="mb-3">
                      <label for="name" class="col-form-label">Name:</label>
                      <input type="text" wire:model="name"  class="form-control @error('name') is-invalid @enderror" name="name">

                      @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror

                   </div>
          
                   <div class="mb-3">
                      <label for="message-text" class="col-form-label">Body:</label>
                      <textarea class="form-control @error('body') is-invalid @enderror " wire:model.defer="body" name="body"></textarea>

                      @error('body')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror

                   </div>
                </form>
             </div>
             <div class="modal-footer">
                <a type="button" href="{{ url('livewire') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">

                  {{ $showModalEdit ? 'Save changes' : 'Save' }}

                </button>
             </div>
          </div>
    </form>

    </div>
  </div>

</div>

