<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cetaksurat\CreateRequest;
use App\Models\CetakSurat;
use Illuminate\Http\Request;

class CetakSuratController extends Controller
{
    protected $cetaksurat;

    public function __construct(CetakSurat $cetaksurat)
    {
        $this->cetaksurat = $cetaksurat;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        return $this->cetaksurat->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
