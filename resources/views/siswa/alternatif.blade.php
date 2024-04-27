@extends('layouts.default')

@section('title', 'Pengisian Nilai Alternatif')

@section('content')
    <div>Nilai Alternatif</div>

    @foreach ($alternatif as $value)
        <div class="mt-3">
            {{ $value->peminatan->pkl_place->title }}
            <div>
                Jarak {{ $value->jarak }}
            </div>
            <div>
                Rating {{ $value->peminatan->pkl_place->rating }}
            </div>
            <div>
                Daya Tampung {{ $value->peminatan->pkl_place->daya_tampung }}
            </div>
            <div>
                Akses Jalan {{ $value->peminatan->pkl_place->akses_jalan }}
            </div>
            {{ $value->peminatan->peminat }}
        </div>
    @endforeach

    <form action="{{ route('student.alternatif_back') }}" method="post">
        @csrf
        @method('post')
        <button type="submit" class="btn-sip">Back</button>
    </form>
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
