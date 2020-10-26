<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        try {
            return response()->json([
                'users' => User::all()
            ]);
        }
        catch (\Exception $e){
            return response()->json([
                'error_type' => 'Internal error',
                'error_message' => 'Erro interno',
                'error_description' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users',
                'phone' => 'required|string|max:255',
                'legal_entity' => 'required|boolean',
                'document' => 'required|string|max:255',
            ], [
                'required' => 'O campo :attribute é obrigatório',
                'max' => 'O campo :attribute não deve ultrapassar :max caracteres',
                'string' => 'O campo :attribute deve ser um texto',
                'unique' => 'E-mail já cadastrado'
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'error_type' => 'Validation error',
                    'error_message'=> $validator->errors(),
                ], 400);
            }
    
    
            $user = User::create($request->only('first_name', 'last_name', 'email', 'phone', 'legal_entity', 'document'));
            return response()->json([
                'message' => 'Registro salvo com sucesso!',
                'user' => $user
            ]);
        }
        catch (\Exception $e){
            return response()->json([
                'error_type' => 'Internal error',
                'error_message' => 'Erro interno',
                'error_description' => $e->getMessage()
            ], 500);
        }
    }

    public function show(User $user)
    {
        try {
            return response()->json([
                'user' => $user
            ]);
        }
        catch (\Exception $e){
            return response()->json([
                'error_type' => 'Internal error',
                'error_message' => 'Erro interno',
                'error_description' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users,email,'.$user->id,
                'phone' => 'required|string|max:255',
                'legal_entity' => 'required|boolean',
                'document' => 'required|string|max:255',
            ], [
                'required' => 'O campo :attribute é obrigatório',
                'max' => 'O campo :attribute não deve ultrapassar :max caracteres',
                'string' => 'O campo :attribute deve ser um texto',
                'unique' => 'E-mail já cadastrado'
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'error_type' => 'Validation error',
                    'error_message'=> $validator->errors(),
                ], 400);
            }

            $user->fill($request->only('first_name', 'last_name', 'email', 'phone', 'legal_entity', 'document'));
            $user->save();
            return response()->json([
                'message' => 'Registro atualizado com sucesso!',
                'user' => $user
            ]);
        }
        catch (\Exception $e){
            return response()->json([
                'error_type' => 'Internal error',
                'error_message' => 'Erro interno',
                'error_description' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'message' => 'Registro deletado com sucesso!'
            ]);
        }
        catch (\Exception $e){
            return response()->json([
                'error_type' => 'Internal error',
                'error_message' => 'Erro interno',
                'error_description' => $e->getMessage()
            ], 500);
        }
    }
}
