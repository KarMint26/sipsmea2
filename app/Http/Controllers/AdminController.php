<?php

namespace App\Http\Controllers;

use App\Models\PklPlace;
use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function index()
    {
        $tempat_pkl_aktif = PklPlace::where('status', 'aktif')->count();
        $tempat_pkl_nonaktif = PklPlace::where('status', 'nonaktif')->count();
        $users_aktif = User::where('status', 'aktif')
                        ->where(function ($query) {
                            $query->where('role', '!=', 'admin');
                        })
                    ->count();
        $users_nonaktif = User::where('status', 'nonaktif')->count();
        return view('admin.dashboard', ["tempat_pkl_aktif" => $tempat_pkl_aktif, "tempat_pkl_nonaktif" => $tempat_pkl_nonaktif, "users_aktif" => $users_aktif, "users_nonaktif" => $users_nonaktif]);
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
        // $requestContent = $request->except(['name_file', 'nisn']);
        // $postData = json_encode($requestContent);
        // $apiKey = env('API_KEY_QR');
        // $url = 'https://api.qr-code-generator.com/v1/create?access-token=' . $apiKey;
        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // $fileContents = curl_exec($ch);
        // if (curl_errno($ch)) {
        //     $errorMessage = curl_error($ch);
        // }
        // curl_close($ch);

        $fileContents = QrCode::format('png')
            ->merge('src/assets/favicon.png', 0.2, true)
            ->size(400)->errorCorrection('H')
            ->backgroundColor(160, 10, 82)
            ->color(255, 255, 255)
            ->eye('square')
            ->margin(4)
            ->generate($request->qr_code_text);

        // Mendefinisikan nama file dan tipe konten
        $filename = $request->name_file . ' - ' . $request->nisn . '.png';
        $contentType = 'image/png';

        // Mengembalikan respons dengan konten gambar dan header yang sesuai
        return response($fileContents, 200)
            ->header('Content-Type', $contentType)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

}
