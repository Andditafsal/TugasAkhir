<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserDetail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = $this->user->paginate($request->per_page);

        return new UserCollection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
            return $this->user->create($request->all());
        }); //create db erors
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //$user = $this->user->findOrFail($id);

        return new UserDetail($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)

    {
        $user = $this->user->findOrFail($id);

        if ($request->password) {
            $request->marge([
                'password' => Hash::make($request->password)
            ]);
        }
        return DB::transaction(function () use ($request, $user) {
            return $user->update($request->all());
        }); //create db erors
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        return DB::transaction(function () use ($user) {
            return $user->delete();
        });
    }
}
