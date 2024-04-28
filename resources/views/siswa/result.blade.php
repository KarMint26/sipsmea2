@extends('layouts.default')

@section('title', 'Hasil Perhitungan SPK')

@section('content')
    <div class="text-center fw-semibold text-result">HASIL PERHITUNGAN METODE SAW (Simple Additive Weighting)</div>
    <div class="table-responsive mt-2 mb-4">
        <table class="table table-striped table-bordered table-sortable table-hover">
            <thead>
                <tr class="text-center">
                    <th class="col col-md-1">No</th>
                    <th class="col col-md-3">Nama Tempat PKL</th>
                    <th class="col col-md-3">Hasil Perhitungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saw as $key => $value)
                    <tr class="text-center">
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $value->title }}
                        </td>
                        <td>
                            {{ $value->hasil }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center fw-semibold text-result">HASIL PERHITUNGAN METODE WP (Weighted Product)</div>
    <div class="table-responsive mt-2 mb-4">
        <table class="table table-striped table-bordered table-sortable table-hover">
            <thead>
                <tr class="text-center">
                    <th class="col col-md-1">No</th>
                    <th class="col col-md-3">Nama Tempat PKL</th>
                    <th class="col col-md-3">Hasil Perhitungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wp as $key => $value)
                    <tr class="text-center">
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $value->title }}
                        </td>
                        <td>
                            {{ $value->hasil }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="m-auto text-center mb-3 mt-4" style="margin-bottom: 4rem;">
        Hasil perhitungan pada {{ $timestamp }}
    </div>

    <a href="{{ route('download_pdf') }}" target="_blank" class="floating_btn">
        <i class="bi bi-download"></i>
        Download PDF
    </a>
@endsection

@section('script_add')
    @if (session('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ session('message') }}")
        </script>
    @endif
@endsection
