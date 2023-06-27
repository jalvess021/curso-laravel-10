<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
    
       $user = User::where('email', $request->email)->first();

      
       if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect']
        ]);
       }

       //if ($request->has('logout_others_devices'))
        $user->tokens()->delete(); //Login único

        $token = $user->createToken($request->device_name)->plainTextToken;
        
        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
    
       $request->user()->tokens()->delete();
    
        
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function me(Request $request) //recuperar usuario autenticado
    {
    
       $user = $request->user();
            
        return response()->json([
            'user' => $user
        ]);
    }

}
