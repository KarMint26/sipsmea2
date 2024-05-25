@extends('layouts.default')

@section('title', 'Hasil Perhitungan SPK')

@section('content')
    <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row gap-5 mb-5 w-full h-fit">
        <img src="{{ asset('src/assets/hero-result.png') }}" alt="hero-result" class="m-sm-auto m-lg-0">
        <div class="result_hero_desc d-flex flex-column">
            <h1 class="title-siswa-1 text-uppercase fw-semibold"><span class="text-primary-sip">Selamat!</span> Berhasil Menampilkan Hasil Perhitungan</h1>
            <h5 class="fw-normal">Hasil perhitungan yang ditampilkan merupakan hasil perhitungan dari Sistem Pendukung Keputusan yang sudah teruji benar perhitungannya.</h5>
            <form method="POST" action="{{ route('student.reset_spk') }}">
                @csrf
                @method('post')
                <button type="submit" class="reset_btn text-center mt-3 shadow-sm">
                    <i class="bi bi-arrow-repeat"></i> Ulangi Perhitungan
                </button>
            </form>
        </div>
    </div>
    <div class="text-left fw-semibold text-result">HASIL PERHITUNGAN METODE SAW (Simple Additive Weighting)</div>
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
                            {{ number_format($value->hasil, 5, '.', '') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-left fw-semibold text-result">HASIL PERHITUNGAN METODE WP (Weighted Product)</div>
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
                            {{ number_format($value->hasil, 5, '.', '') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-left fw-semibold text-result">HASIL PERHITUNGAN METODE TOPSIS</div>
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
                @foreach ($topsis as $key => $value)
                    <tr class="text-center">
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $value->title }}
                        </td>
                        <td>
                            {{ number_format($value->hasil, 5, '.', '') }}
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
