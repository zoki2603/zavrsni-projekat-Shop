<?php

namespace App\Http\Controllers\Auth;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Services\AuthEmployeeService;
use App\Services\AuthenticationService;
use App\Http\Requests\EmployeeRegisterRequest;

class AuthEmployeeController extends Controller
{
    public function  showLoginEmployee()
    {
        return view("layout.employee.auth.employee_login");
    }
    public function loginEmployee(LoginRequest $request)
    {

        $service = new AuthenticationService();

        $success = $service->login(
            "employee",
            $request->input("email"),
            $request->input("password")
        );

        return $success ? redirect()->route("dashbord") : redirect()->back()->with([
            'email' => "Podaci nisu dobri"
        ]);
    }
    public function logoutEmployee()
    {
        $service = new AuthenticationService();

        $service->logout("employee");

        return redirect()->route("employee.show.login");
    }
    public function registerShow()
    {
        return view("layout.employee.auth.employee_register");
    }

    public function register(EmployeeRegisterRequest $request)
    {
        $service = new AuthEmployeeService();
        $employee = new Employee();
        $success = $service->registerEmployee($request, $employee);

        return  redirect()->back()->with(["message", "Uspesno ste kreirali zaposnenog"]);
    }
}
