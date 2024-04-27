@extends('layouts.default')

@section('title', 'Pengisian Nilai Alternatif')

@section('content')
    <div>Nilai Alternatif</div>

    @foreach ($peminatan as $value)
        <div class="mt-3">
            {{ $value->pkl_place()->first()->title }}
            <div>
                Jarak {{ $value->alternatifs()->jarak }}
            </div>
            <div>
                Rating {{ $value->pkl_place()->first()->rating }}
            </div>
            <div>
                Daya Tampung {{ $value->pkl_place()->first()->daya_tampung }}
            </div>
            <div>
                Akses Jalan {{ $value->pkl_place()->first()->akses_jalan }}
            </div>
            {{ $value->peminat }}
        </div>
    @endforeach

    @if ($data_cb != null)
        @foreach ($data_cb as $cb)
            <div>{{ $cb }}</div>
        @endforeach
    @endif

    <form action="{{ route('student.alternatif_back', ['data_cb' => $data_cb]) }}" method="post">
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
