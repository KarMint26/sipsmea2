@extends('layouts.default_dashboard')

@section('title', 'HASIL SPK SISWA')
@section('subtitle', 'HASIL SPK SISWA')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive px-1">
                <table id="hasil_spk" class="table table-striped m-auto" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">NISN Siswa</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_siswa as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $value->name }}</td>
                                <td class="text-center">{{ $value->username }}</td>
                                <td class="text-center">{{ $value->status }}</td>
                                <td class="text-center">
                                    <a target="_blank" href="{{ route('download_pdf_admin', ['name' => $value->name, 'username' => $value->username, 'id' => $value->id]) }}" class="btn btn-sm"
                                        style="background-color: rgb(1, 161, 94); color: #fff">
                                        <i class="fas fa-file-pdf mr-1"></i>
                                        Download Hasil
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script_add')
    <script>
        $(document).ready(() => {
            const table = $("#hasil_spk").DataTable({
                layout: {
                    topEnd: {
                        search: {
                            text: "Cari data:",
                            placeholder: "Cari data siswa...",
                        },
                    },
                },
                lengthMenu: [
                    [5, 10, -1],
                    [5, 10, "All"],
                ],
            });
        })
    </script>
@endsection
