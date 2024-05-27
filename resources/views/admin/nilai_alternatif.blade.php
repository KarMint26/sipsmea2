@extends('layouts.default_dashboard')

@section('title', 'NILAI ALTERNATIF')
@section('subtitle', 'NILAI ALTERNATIF')

@section('datatables')
    {{-- Select2 css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css" />

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')
    @livewire('alternatifs')
@endsection
