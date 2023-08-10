<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Data;

class DataController extends Controller
{
    public function index()
    {
        $data = Data::all();

        return response()->json($data);
        // return view('welcome', ['data' => $data]);
    }
    public function store(Request $request)
    {
        $data = new Data;
        $data->name = $request->name;
        $data->qr = QrCode::size(200)->generate($request->name);
        $data->save();



        //$data->update();
        return back();
    }
    public function generate($id)
    {
        $data = Data::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($data->name);
        return view('qrcode', compact('qrcode'));
    }
}
