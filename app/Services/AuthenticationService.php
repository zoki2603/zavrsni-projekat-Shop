<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{

    public function register(RegisterRequest $request, User $user)
    {
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            return redirect()->route("user.show.register")->with([
                "message" => "Korisnik vec postoji"
            ]);
        }
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->save();
    }

    public function login($guard, $email, $password)
    {
        return Auth::guard($guard)->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }


    public function logout($guard)
    {
        Auth::guard($guard)->logout();

        session()->flush();
        session()->regenerate();
    }
}
