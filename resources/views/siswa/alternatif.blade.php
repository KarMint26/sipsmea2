@extends('layouts.default')

@section('title', 'Pengisian Nilai Alternatif')

@section('content')
    <div class="text-center fw-semibold text-result"><span class="text-primary-sip">NILAI</span> ALTERNATIF</div>

    <div class="table-responsive mt-2 mb-4">
        <table class="table table-striped table-bordered table-sortable table-hover">
            <thead class="tw">
                <tr class="tw text-center">
                    <th class="col col-md-1">No</th>
                    <th class="col col-md-3">Tempat PKL</th>
                    <th class="col col-md-1">Jarak</th>
                    <th class="col col-md-1">Rating</th>
                    <th class="col col-md-2">Daya Tampung</th>
                    <th class="col col-md-2">Akses Jalan</th>
                    <th class="col col-md-2">Peminat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatif as $key => $value)
                    <tr class="text-center">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $value->peminatan->pkl_place->title }}
                        </td>
                        <td>
                            {{ $value->jarak }}
                        </td>
                        <td>
                            {{ $value->peminatan->pkl_place->rating }}
                        </td>
                        <td>
                            {{ $value->peminatan->pkl_place->daya_tampung }}
                        </td>
                        <td>
                            {{ $value->peminatan->pkl_place->akses_jalan }}
                        </td>
                        <td>
                            {{ $value->peminatan->peminat }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="ms-auto mb-5 d-flex gap-2 align-items-center">
        <form action="{{ route('student.alternatif_back') }}" method="post">
            @csrf
            @method('post')
            <button type="submit" class="btn btn-secondary">Kembali</button>
        </form>
        <!-- Button trigger modal -->
        <button type="button" style="margin-top: 0 !important" class="btn-sip" data-bs-toggle="modal"
            data-bs-target="#addDistance">
            Tambahkan Nilai Jarak
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addDistance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addDistanceLabel" aria-hidden="true">
            <form action="{{ route('student.alternatif_post') }}" method="post">
                @csrf
                @method('post')
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addDistanceLabel"><span class="text-primary-sip">ISI</span>
                                JARAK
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach ($alternatif as $value)
                                <div class="mb-3">
                                    <label for="{{ $value->peminatan->pkl_place->title }}"
                                        class="form-label">{{ $value->peminatan->pkl_place->title }}</label>
                                    <input type="number" name="alt[]"
                                        class="form-control" id="{{ $value->peminatan->pkl_place->title }}"
                                        placeholder="Jarak rumah ke {{ $value->peminatan->pkl_place->title }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
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
            toastr.error("Semua jarak wajib diisi")
        </script>
    @endif
@endsection
