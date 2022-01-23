@extends('layouts.main')

@section('container')
   <livewire:blog-index></livewire:blog-index>

@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

    <script>

       // Show modal for add data and edit data
       window.addEventListener('show-modal', event => {
          $('#exampleModal').modal('show');
       });

      // 
       window.addEventListener('hide-modal', event => {
          $('#exampleModal').modal('hide');
       });

        // Confirm Alert
      window.addEventListener('swal:confirm', event => {
       
         try {
            Swal.fire({
            'title': event.detail.title,
            'text': event.detail.text,
            'icon': event.detail.icon,
            'showCancelButton': true,
            'confirmButtonColor': '#3085d6',
            'cancelButtonColor': '#d33',
            'confirmButtonText': 'Hello!'
         })
         .then((result) => {
            if(result.isConfirmed) {
              window.livewire.emit('delete',event.detail.id);
            }
         })
         
         } catch (error) {
            console.log(error);
         }
         
      });

      //  Alert
      window.addEventListener('swal:modal', event => {
         Swal.fire({
             'title': event.detail.title,
             'text': event.detail.text,
             'icon': event.detail.icon,
          })
      });
   </script>
@endsection
