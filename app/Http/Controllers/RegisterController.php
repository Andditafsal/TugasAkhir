<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function __invoke(RegisterRequest $request) // invoke menjalankan satu fungsi "register"
    {
        return DB::transaction(function () use ($request) {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
            return $this->model->create($request->all());
        }); //create db erors
    }
}
