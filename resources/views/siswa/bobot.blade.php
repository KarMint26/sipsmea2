@extends('layouts.default')

@section('title', 'Pengisian Nilai Bobot')

@section('content')
    <div>Bobot</div>
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
