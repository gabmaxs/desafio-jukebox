<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->only('first_name', 'last_name', 'email', 'phone', 'legal_entity', 'document'));
        return response()->json([
            'user' => $user
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->only('first_name', 'last_name', 'email', 'phone', 'legal_entity', 'document'));
        $user->save();
        return response()->json([
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Registro deletado com sucesso!'
        ]);
    }
}
