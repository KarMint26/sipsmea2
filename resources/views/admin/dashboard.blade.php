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
                <a href="{{ route('dashboard.tempat_pkl') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('dashboard.hasil_spk') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{ route('dashboard.manajemen_pengguna') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $user_not_verified }}</h3>

                    <p>Belum Terverifikasi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-times"></i>
                </div>
                <a href="{{ route('dashboard.verifikasi_pengguna') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <div class="mt-3 mb-5 card col-12">
            <div class="card-header" style="font-weight: 600; font-size: 1.25rem;"><span
                    style="color: var(--primaryColor)">Grafik</span> Peminat
                Tempat PKL</div>
            <div class="card-body">
                <canvas id="myChart"aria-label="Peminat Tempat PKL" role="img"></canvas>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection

@section('script_add')
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart');
            const labelsFull = {!! json_encode($labels_full) !!};
            const labels = {!! json_encode($labels) !!};
            const data = {!! json_encode($data) !!};

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Peminat Tempat PKL',
                        data: data,
                        borderWidth: 1,
                        borderColor: '#f0cd09',
                        backgroundColor: '#a00a52',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        callbacks: {
                            title: function(tooltipItems, data) {
                                return labelsFull[tooltipItems[0].index];
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
