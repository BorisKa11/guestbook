<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Hash;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    public function register(CreateUserRequest $request)
    {
        try {
            $password = $request->input('password');

            $user = new User;
            $user->name = '';
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->save();

            Auth::login($user, true);

            return response()->json([
                'status' => 1
            ], 200);
        } catch (JsonException $e) {
            return response()->json([
                'errors' => $e->getMessage()
            ], 200);
        }
    }

    public function enter(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $check = Auth::attempt($credentials, $request->has('remember') ? true : false);

        if (!$check) {
            return response()->json(['status' => 0], 200);
        }

        return response()->json(['status' => 1], 200);;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
