@extends('layouts.default_dashboard')

@section('title', 'VERIFIKASI PENGGUNA')
@section('subtitle', 'VERIFIKASI PENGGUNA')

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
                        <tr class="text-center">
                            <th class="col col-md-1 text-center">No</th>
                            <th class="col col-md-2 text-center">Nama Siswa</th>
                            <th class="col col-md-1 text-center">NISN</th>
                            <th class="col col-md-2 text-center">Email</th>
                            <th class="col col-md-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_siswa as $key => $value)
                            <tr class="text-center">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $value->name }}</td>
                                <td class="text-center">{{ $value->nisn }}</td>
                                <td class="text-center">{{ $value->email }}</td>
                                <td class="action-field">
                                    <a href="{{ route('acc_user', ['id' => $value->id]) }}" class="btn btn-sm"
                                        style="background-color: rgb(0, 182, 91); color: #fff;">
                                        <i class="fas fa-check mr-1"></i>
                                        Terima
                                    </a>
                                    <button type="submit" class="text-center btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapusSpk-{{ $value->id }}">
                                        <i class="fas fa-times mr-1"></i>
                                        Tolak
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="hapusSpk-{{ $value->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusSpkLabel-{{ $value->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 fw-semibold" id="hapusSpkLabel-{{ $value->id }}">
                                                <span class="text-primary-sip">TOLAK</span>
                                                VERIFIKASI AKUN
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>Apakah anda yakin ingin menolak akun?, akun akan dihapus dari database
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <a href="{{ route('decline_user', ['id' => $value->id]) }}"
                                                class="btn btn-danger">
                                                Tolak Verifikasi Akun
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
