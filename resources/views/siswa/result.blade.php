@extends('layouts.default')

@section('title', 'Hasil Perhitungan SPK')

@section('content')
    <div>Hasil</div>
@endsection

@section('script_add')
    @if (session('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.warning("{{ session('message') }}")
        </script>
    @endif
@endsection
