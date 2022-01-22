@extends('layouts.main')

@section('container')
   <livewire:blog-index></livewire:blog-index>
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

    <script>

       // Show modal          for ADD data and EDIT data
       window.addEventListener('show-modal', event => {
          $('#exampleModal').modal('show');
       });

      // Hide modal           for ADD data and EDIT data
       window.addEventListener('hide-modal', event => {
          $('#exampleModal').modal('hide');
       });

      // Confirm modal

      //  Alert
      window.addEventListener('swal:modal', event => {
         Swal.fire({
             'title': event.detail.title,
             'text': event.detail.text,
             'icon': event.detail.icon,
          })
      })
   </script>
@endsection
