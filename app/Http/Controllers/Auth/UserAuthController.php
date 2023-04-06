<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthenticationService;

class UserAuthController extends Controller
{

    public function loginShow()
    {
        return view("layout.auth.login");
    }
    public function registerShow()
    {
        return view("layout.auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $service = new AuthenticationService();
        $user = new User();
        $success = $service->register($request, $user);

        return  redirect()->route('user.show.login');
    }



    public function login(LoginRequest $request)
    {

        $service = new AuthenticationService();

        $success = $service->login(
            "web",
            $request->input("email"),
            $request->input("password")
        );

        return $success ? redirect()->route("home") : redirect()->back()->with([
            'error' => "Podaci nisu dobri"
        ]);
    }

    public function logout(AuthenticationService $service)
    {
        $service->logout("web");

        return redirect()->route("user.login");
    }
}
