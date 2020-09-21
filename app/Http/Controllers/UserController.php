<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request) {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|regex:' . $this->custom_regex,
            'username' => 'alphanum|unique:users,username',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        
        $request->validate([
            'password_confirmation' => 'nullable|min:8'
        ]);

        if(auth()->user()->id !== $validatedData['id']) {
            return response()->json([], 401);
        }
        if($validatedData['password'] === null) {
            $validatedData['password'] = auth()->user()->password;
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        auth()->user()->update($validatedData);
        return response()->json([
            'password' => auth()->user()->password,
            'new password' => $validatedData['password']
        ], 200);
    }
}