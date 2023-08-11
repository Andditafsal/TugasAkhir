<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserDetail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $query = $this->user->query();

        if ($request->has('search')) {
            $query->where("name", "like", "%" . $request->search . "%")
                ->orWhere("email", "like", "%" . $request->search . "%");
        }
        $users = $query->where('id_role', '!=', 1)->where('id_role', '!=', 3)->paginate($request->per_page);

        return new UserCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $file = "";
            if ($request->hasFile('picture')) {
                $file = $request->file('picture')->store('profile_picture');
                $profilePictureUrl = url('/storage/' . $file);
            }

            $role = Role::where("name", $request->role)->first();

            $request->merge([
                'password' => Hash::make($request->password),
                'profile_picture' => $profilePictureUrl,
                'id_role' => $role->id
            ]);

            return $this->user->create($request->all());
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserDetail($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $user = $this->user->findOrFail($id);

        if ($request->hasFile('picture')) {
            if ($user->profile_picture) {
                $path = str_replace(url('storage') . '/', '', $user->profile_picture);
                Storage::delete($path);
            }
            $file = $request->file('picture')->store('profile_picture');
            $profilePictureUrl = url('/storage/' . $file); // Construct the URL

            $request->merge([
                'profile_picture' => $profilePictureUrl
            ]);
        }

        if ($request->password) {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
        } else {
            $request->offsetUnset('password');
        }

        return DB::transaction(function() use($request, $user){
            return $user->update($request->except('password'));
        });

        // return DB::transaction(function () use ($request, $user) {
        //     return $user->update($request->all());
        // });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return DB::transaction(function () use ($user) {
            if ($user->profile_picture) {
                $path = str_replace(url('storage') . '/', '', $user->profile_picture);
                Storage::delete($path);
            }

            return $user->delete();
        });
    }
}
