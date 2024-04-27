<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $name }} - {{ $nis }} - {{ $timestamp }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />

    <style>
        .text-name {
            font-size: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #fff;
        }

        .tw {
            background-color: #fff !important;
        }

        /* Warna latar belakang baris ganjil */
        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        /* Warna latar belakang baris genap */
        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>

</head>

<body>
    <div class="m-auto text-center mb-5">
        <h1><span style="color: #a00a52;">SIP</span> SMEA</h1>
        <h3>Sistem Pendukung Keputusan Pemilihan Tempat PKL</h3>
    </div>

    <div>
        <div class="text-name mb-3">Nama Siswa : {{ $name }}</div>
        <div class="text-name">NIS Siswa : {{ $nis }}</div>
    </div>

    <div class="text-center fw-semibold text-result mt-5">HASIL PERHITUNGAN METODE SAW (Simple Additive Weighting)</div>
    <div class="table-responsive mt-2 mb-5">
        <table class="table table-striped table-bordered table-sortable table-hover">
            <thead class="tw">
                <tr class="tw text-center">
                    <th class="col col-md-1">No</th>
                    <th class="col col-md-3">Nama Tempat PKL</th>
                    <th class="col col-md-3">Hasil Perhitungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saw as $key => $value)
                    <tr class="text-center">
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $value->title }}
                        </td>
                        <td>
                            {{ $value->hasil }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center fw-semibold text-result">HASIL PERHITUNGAN METODE WP (Weighted Product)</div>
    <div class="table-responsive mt-2 mb-4">
        <table class="table table-striped table-bordered table-sortable table-hover">
            <thead class="tw">
                <tr class="tw text-center">
                    <th class="col col-md-1">No</th>
                    <th class="col col-md-3">Nama Tempat PKL</th>
                    <th class="col col-md-3">Hasil Perhitungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wp as $key => $value)
                    <tr class="text-center">
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $value->title }}
                        </td>
                        <td>
                            {{ $value->hasil }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="m-auto text-center mb-3 mt-5">
        Hasil perhitungan pada {{ $timestamp }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>
