@extends('layouts.default')

@section('title', 'Pilih Tempat PKL')

@section('content')
    <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row gap-5 mb-5 w-full h-fit">
        <img src="{{ asset('src/assets/hero-choose.png') }}" alt="hero-choose" class="m-sm-auto m-lg-0">
        <div class="d-flex flex-column">
            <h1 class="title-siswa-1 text-uppercase fw-semibold"><span class="text-primary-sip">Pilih</span> Tempat PKL</h1>
            <h4 class="fw-normal">Pilihlah 5 tempat PKL yang anda minati</h4>
            <form action="{{ route('student.send_pkl') }}" method="post" class="mt-2 mt-sm-3">
                @csrf
                @method('post')
                @foreach ($pkl_places as $pkl)
                    <div class="form-check">
                        <input class="cb form-check-input border-sip text-primary-sip" type="checkbox"
                            value="{{ $pkl->id }}" name="cb[]" id="{{ $pkl->id }}">
                        <label class="fcl form-check-label" for="{{ $pkl->id }}">
                            {{ $pkl->title }}
                        </label>
                    </div>
                @endforeach
                <button class="btn-sip mt-4" type="submit">Kirim</button>
            </form>
        </div>
    </div>
@endsection

@section('script_add')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var checkboxes = document.querySelectorAll('.cb');
            var maxChecked = 5;

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    var checkedCheckboxes = document.querySelectorAll('.cb:checked');
                    if (checkedCheckboxes.length > maxChecked) {
                        checkbox.checked = false;
                    }
                });
            });
        });
    </script>
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
@endsection
