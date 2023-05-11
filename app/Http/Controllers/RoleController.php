<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller



{
    protected $model;
    public function __construct(Role $model)
    {
        $this->model = $model;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response()->json([
            'data' => $this->model->all()
        ]);
    }
}
