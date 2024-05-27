@extends('layouts.default_dashboard')

@section('title', 'DASHBOARD')
@section('subtitle', 'DASHBOARD')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $tempat_pkl_aktif }}</h3>

                    <p>Tempat PKL Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $hasil_spk_siswa }}</h3>

                    <p>Hasil SPK Siswa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-trophy"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $users_aktif }}</h3>

                    <p>Pengguna Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>5</h3>

                    <p>Total Kriteria</p>
                </div>
                <div class="icon">
                    <i class="fas fa-id-card"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

    </div>
    <!-- /.row (main row) -->
@endsection
