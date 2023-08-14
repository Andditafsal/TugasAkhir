<?php

namespace App\Http\Controllers;

use App\Models\Ttdjs;
use Illuminate\Http\Request;

class TtdjsController extends Controller
{
    public function store(Request $request)
    {
        $ttdjs = new Ttdjs();
        $ttdjs->signature_data = $request->input('ttdjs');
        $ttdjs->save();

        return response()->json(['message' => 'Ttd saved successfully'], 201);
    }
}
