<?php

namespace App\Http\Controllers;

use App\Models\Signature;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function store(Request $request)
    {
        // $signature = new Signature();
        // $signature->signature_data = $request->input('signature');
        // $signature->save();

        $signature = Signature::first();

        if ($signature) {
            $signature->update([
                'signature_data' => $request->input('signature')
            ]);
        } else {
            $signature = Signature::create([
                'signature_data' => $request->input('signature')
            ]);
        }


        return response()->json(['message' => 'Signature saved successfully'], 201);
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
