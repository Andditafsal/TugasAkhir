<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Resources\User\GetProfilResource;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function get_profil()
    {

        return DB::transaction(function () {

            $user = User::where("id", Auth::user()->id)->first();

            return response()->json($user);
            // echo "ada";
        });
    }
    public function update_profile(Request $request)
    {
        return DB::transaction(function () use ($request) {
            if ($request->file("profile_picture")) {
                if ($request->gambarLama) {
                    Storage::delete($request->gambarLama);
                }

                $nama_gambar = $request->file("profile_picture")->store("picture");

                $data = url("/storage/" . $nama_gambar);
            } else {
                $data = url('') . '/storage/' . $request->gambarLama;
            }

            User::where("id", Auth::user()->id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "jenis_kelamin" => $request->jenis_kelamin,
                "no_hp" => $request->no_hp,
                "alamat" => $request->alamat,
                "profile_picture" => $data
            ]);

            return response()->json(["pesan" => "data berhasil diubah"]);
        });
    }
}
