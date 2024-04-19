<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function tempat_pkl(){
        return view('admin.tempat_pkl');
    }

    public function manajemen_pengguna(){
        return view('admin.manajemen_pengguna');
    }

    public function barcode_generator(Request $request)
    {
        $requestContent = $request->content;
        $url = 'https://barcodeapi.org/api/qr/' . $requestContent;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $fileContents = curl_exec($ch);
        curl_close($ch);

        $filename = 'barcode.png';
        $contentType = 'image/png';

        return response($fileContents, 200)
            ->header('Content-Type', $contentType)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
