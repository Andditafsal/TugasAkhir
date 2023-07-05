<?php

namespace App\Http\Controllers;

use App\Http\Requests\Disposisi\CreateRequest;
use App\Models\Disposisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisposisiController extends Controller
{
    protected $disposisi;
    /**
     * Handle the incoming request.
     */
    public function __construct(Disposisi $disposisi)
    {
        $this->disposisi = $disposisi;
    }
    public function __invoke(CreateRequest $request, $id)
    {
        $request->merge([
            'surat_masuk_id' => $id
        ]);
        return $this->disposisi->create($request->all());
    }
}
