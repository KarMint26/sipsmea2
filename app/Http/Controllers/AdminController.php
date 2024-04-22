<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function tempat_pkl()
    {
        return view('admin.tempat_pkl');
    }

    public function manajemen_pengguna()
    {
        return view('admin.manajemen_pengguna');
    }

    public function barcode_generator(Request $request)
    {
        // Mengambil nilai dari properti content dalam request
        $requestContent = $request->all();

        // Mengambil API key dari variabel lingkungan
        $apiKey = env('API_KEY_QR');

        // URL endpoint API
        $url = 'https://api.qr-code-generator.com/v1/create?access-token=' . $apiKey;

        // Data yang akan dikirimkan dalam body permintaan
        $postData = json_encode($requestContent);

        // Inisialisasi CURL
        $ch = curl_init();

        // Set opsi CURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // Eksekusi permintaan dan tangkap responsenya
        $fileContents = curl_exec($ch);

        // Menangani error jika ada
        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            // Lakukan sesuatu dengan pesan error
        }

        // Menutup CURL
        curl_close($ch);

        // Mendefinisikan nama file dan tipe konten
        $filename = 'barcode.png';
        $contentType = 'image/png';

        // Mengembalikan respons dengan konten gambar dan header yang sesuai
        return response($fileContents, 200)
            ->header('Content-Type', $contentType)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

}
