@extends('layouts.default')

@section('title', 'Edit Profile')

@section('content')
    <div class="d-flex justify-content-between align-items-start flex-column flex-lg-row-reverse gap-5 mb-5 w-full h-fit">
        <img src="{{ asset('src/assets/hero-edit-profile.png') }}" alt="hero-choose" class="m-sm-auto m-lg-0">
        <div class="result_hero_desc d-flex flex-column">
            <h1 class="title-siswa-1 text-uppercase fw-semibold"><span class="text-primary-sip">Edit</span> Profile
            </h1>
            <h5 class="btext fw-normal">Edit profile anda sesuai apa yang anda inginkan. Diharapkan sesuai dengan nama
                lengkap dan NISN anda sebagai siswa.</h5>

            <div class="mt-4">
                <form action="{{ route('student.edit_profile_post') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_siswa" class="form-control" id="name"
                            value="{{ $user->name }}" placeholder="Nama lengkap...">
                    </div>
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN Siswa</label>
                        <input type="number" name="nisn_siswa" class="form-control" id="nisn"
                            value="{{ $user->username }}" placeholder="NISN Siswa...">
                    </div>
                    <button type="submit" class="reset_btn text-center mt-4 shadow-sm">
                        <i class="bi bi-person-vcard-fill"></i> Ubah Profile
                    </button>
                </form>
            </div>
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
            toastr.success("{{ session('message') }}")
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ session('error') }}")
        </script>
    @endif

    @if ($errors->any())
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("Gagal Mengubah Profile, Nama lengkap minimal 3 character, NISN minimal 5 digit angka")
        </script>
    @endif
@endsection
