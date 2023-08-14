<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignatureController extends Controller
{
    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {
            $signature = Signature::where("surat_keluar_id", $request->surat_keluar_id)
                ->first();
    
            if (!empty($signature)) {
                $signature->update([
                    'signature_data' => $request->input('signature')
                ]);
            } else {
                $signature = Signature::create([
                    'signature_data' => $request->input('signature'),
                    "surat_keluar_id" => $request->surat_keluar_id
                ]);
            }
    
            return response()->json(['message' => 'Signature saved successfully'], 201);
        });
    }
    // public function uploadSignatureImage(Request $request)
    // {
    //      return DB::transaction(
    //         function () use ($request){
    //             $file = "";
    //             if ($request->hasFile('signature_data')){
    //                 $file = $request->file('signature_data')->store('signature_data');

    //             }

    //         }
    //     );
    // }
}
