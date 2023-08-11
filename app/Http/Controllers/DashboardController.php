<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use App\Models\Disposisi;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function surat_masuk()
    {
        try {
            $count = SuratMasuk::count();

            return response()->json(["count" => $count]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function surat_keluar()
    {
        try {
            $count = SuratKeluar::count();

            return response()->json(["count" => $count]);
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function user()
    {
        try {
            $count = User::count();

            return response()->json(["count" => $count]);
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function disposisi()
    {
        try {
            $count = Disposisi::count();

            return response()->json(["count" => $count]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function dashboard()
    {
        $data = [
            'user' => User::count(),
            'surat_keluar' => SuratKeluar::count(),
            'surat_masuk' => SuratMasuk::count(),
            'disposisi' => Disposisi::count(),
        ];

        return response()->json(['data' => [$data]]);
    }
}
