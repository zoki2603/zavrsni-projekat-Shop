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

    public function login(LoginRequest $request)
    {

        $service = new AuthenticationService();

        $success = $service->login(
            "admin",
            $request->input("email"),
            $request->input("password")
        );
        return $success ? redirect()->route("admin.index") : redirect()->back()->with([
            'error' => "Podaci nisu dobri"
        ]);
    }
    public function logout()
    {
        $service = new AuthenticationService();

        $service->logout("admin");

        return redirect()->route("admin.show.login");
    }
}
