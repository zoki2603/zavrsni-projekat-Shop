<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Services\AuthenticationService;

class AdminAuthController extends Controller
{

    public function adminLoginShow()
    {
        return view("layout.admin.admin_login");
    }
    public function adminHome()
    {
        return view("layout.admin.admin_home");
    }
    public function login(LoginRequest $request)
    {

        $service = new AuthenticationService();

        $success = $service->login(
            "admin",
            $request->input("email"),
            $request->input("password")
        );

        return $success ?
            redirect()->route("admin.show.home") :
            redirect()->back()->withErrors([
                'email' => 'Podaci nisu dobri',
            ]);
    }
    public function logout()
    {
        $service = new AuthenticationService();

        $service->logout("admin");

        return redirect()->route("admin.show.login");
    }
}
