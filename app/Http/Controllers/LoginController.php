<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function __invoke(LoginRequest $request)
    {
        $user = $this->model->where('email', $request->email)->first();
        // return $user;
        if (!$user) {
            return response()->json([
                'messages' => 'email or password wrong!',
                'status_code' => 400
            ], 400);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'messages' => 'Incorrect password!!',
                'status_code' => 400
            ], 400);
        }

        $token = $user->createToken('api', ['authenticated']);

        return $token;
    }
}
