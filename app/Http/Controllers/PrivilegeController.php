<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Privilege;

class PrivilegeController extends Controller
{
    public function index() {
        return response()->json([
            'privileges' => Privilege::orderBy('id')->get()
        ]);
    }

    public function show(Privilege $privilege) {
        $privilege->load('users');
        return response()->json($privilege);
    }

    public function update(Privilege $privilege, Request $request) {
        $privilege->update($request->all());
        return response()->json($privilege);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'string|required',
            'benefits' => 'string|required',
            'price' => 'numeric|required',
            'duration' => 'numeric|required'
        ]);

        $privilege = Privilege::create($request->all());
        return response()->json($privilege);
    }

    public function destroy(Privilege $privilege) {
        $privilege->delete();
        return response()->json(['message'=>'This privilege has been deleted.']);
    }
}
