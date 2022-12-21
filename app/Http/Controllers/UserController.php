<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return response()->json([
            'users' => User::with('privilege')->orderBy('id')->get()
        ]);
    }
    
    public function show(User $user) {
        $user->load('privilege');
        return response()->json($user);
    }

    public function update(User $user, Request $request) {
        $user->update($request->all());
        return response()->json($user);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'membership' => 'string|required',
            'priv_id' => 'required',
        ]);

        $user = User::create($request->all());
        return response()->json($user);
    }

    public function destroy(User $user) {
        $user->delete();
        return response()->json(['message'=>'This user has been deleted.']);
    }
}
