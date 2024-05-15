@extends('layouts.blank') @section('content')
    @include('includes.invoice-print')

    <script>
        window.addEventListener("load", window.print());
    </script>
@endsection
