<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->input('name');


        $users = User::query();

        if ($name) {
            $users->where('name', 'like', '%' . $name . '%');
        }


        $results = $users->get();

        return response()->json($results);
    }
}
