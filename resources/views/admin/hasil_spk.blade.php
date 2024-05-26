@extends('layouts.default_dashboard')

@section('title', 'HASIL SPK SISWA')
@section('subtitle', 'HASIL SPK SISWA')

@section('datatables')
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css" />

    <!-- Script -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
@endsection

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
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_siswa as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $value->name }}</td>
                                <td class="text-center">{{ $value->nisn }}</td>
                                <td class="text-center">{{ $value->email }}</td>
                                <td class="text-center">{{ $value->status }}</td>
                                <td class="text-center">
                                    <a target="_blank"
                                        href="{{ route('download_pdf_admin', ['name' => $value->name, 'nisn' => $value->nisn, 'id' => $value->id]) }}"
                                        class="btn btn-sm" style="background-color: rgb(1, 161, 94); color: #fff">
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
