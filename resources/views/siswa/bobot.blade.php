@extends('layouts.default')

@section('title', 'Pengisian Nilai Bobot')

@section('content')
    <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row-reverse gap-5 mb-5 w-full h-fit">
        <img src="{{ asset('src/assets/hero-bobot.png') }}" alt="hero-choose" class="m-sm-auto m-lg-0">
        <div class="d-flex flex-column">
            <h1 class="title-siswa-1 text-uppercase fw-semibold"><span class="text-primary-sip">Masukan</span> Bobot Kriteria
            </h1>
            <h4 class="btext fw-normal">Bobot untuk tiap kriteria</h4>
            <form action="{{ route('student.bobot_post') }}" method="post" class="mt-2 mt-sm-3">
                @csrf
                @method('post')
                <select class="form-select mb-3" name="w1" id="w1" aria-label="w1">
                    <option selected disabled>Bobot Untuk Jarak</option>
                    <option value="-1">1</option>
                    <option value="-2">2</option>
                    <option value="-3">3</option>
                    <option value="-4">4</option>
                    <option value="-5">5</option>
                </select>

                <select class="form-select mb-3" name="w2" id="w2" aria-label="w2">
                    <option selected disabled>Bobot Untuk Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <select class="form-select mb-3" name="w3" id="w3" aria-label="w3">
                    <option selected disabled>Bobot Untuk Daya Tampung</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <select class="form-select mb-3" name="w4" id="w4" aria-label="w4">
                    <option selected disabled>Bobot Untuk Akses Jalan</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <select class="form-select mb-3" name="w5" id="w5" aria-label="w5">
                    <option selected disabled>Bobot Untuk Peminat</option>
                    <option value="-1">1</option>
                    <option value="-2">2</option>
                    <option value="-3">3</option>
                    <option value="-4">4</option>
                    <option value="-5">5</option>
                </select>
                <button class="btn-sip mt-2" type="submit">Submit</button>
            </form>
        </div>
    </div>
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

    @if (session('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ session('success') }}")
        </script>
    @endif

    @if ($errors->any())
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("Semua bobot wajib diisi")
        </script>
    @endif
@endsection
