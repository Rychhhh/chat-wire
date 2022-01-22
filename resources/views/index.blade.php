@extends('layouts.main')

@section('container')
   <livewire:blog-index></livewire:blog-index>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

       // Show modal          for ADD data and EDIT data
       window.addEventListener('show-modal', event => {
          $('#exampleModal').modal('show');
       });

      // Hide modal           for ADD data and EDIT data
       window.addEventListener('hide-modal', event => {
          $('#exampleModal').modal('hide');
       });

      // Confirm Alert
      window.addEventListener('swal:confirm', event => {
         Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            buttons: true,
            dangerMode: true,
         }).then(willDelete) => {
            if(willDelete) {
               window.livewire.emit('Delete', event.detail.id)
            }
         }
      })

      // Info Alert
      window.addEventListener('swal:modal', event => {
         Swal.fire({
             'title': event.detail.title,
             'text': event.detail.text,
             'icon': event.detail.icon,
          })
      })
   </script>
@endsection
