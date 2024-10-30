@extends('admin.layout.app')

@section('title')
    Admin - Senarasi
@endsection
@section('costum-css')
<style>
    .koykoy{
        display: flex; 
        justify-content: center; 
        align-items: center;
    }
    .ayay{
        width: 60%; max-width: 1200px;
    }
    .judulhalaman{

        text-align: center;
    }
    @media (max-width: 991px) {
    .koykoy{
        justify-content: start; 
        align-items: start;
    }
    .ayay{
        width: 100%; 
        max-width: 1200px;
    }
    .judulhalaman{
        margin: 0px;
        margin-bottom:12px;
        font-size: 28px;
        text-align: start;
    }
    .button-departemen{
        font-size: 14px;
        padding: 12px 16px;
    }
    td{
        font-size: 16px;
    }
}
</style>
@endsection
@section('title')
    Admin - Senarasi
@endsection
@section('content')
    <!--Badan Isi-->
    <div style="margin-top: -12px;">
   




    </div>

@endsection

@section('modal')
    @include('layout.alert')

    



@endsection


@section('custom-js')
<script>
    $(document).ready(function () {
        $('.selectize').selectize({
            placeholder: "Choose Category...",
            allowClear: true,
            create: false
  });
});
</script>
@endsection

@section('alert')
@if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 3000);
        });
    </script>
@endif
@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#errorModal').modal('show');
        });
    </script>
@endif
@endsection
