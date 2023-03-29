<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeRegisterRequest;

class AuthEmployeeService
{
    public function registerEmployee(EmployeeRegisterRequest $request, Employee $employee)
    {
        $existingEmployee = Employee::where('email', $request->input('email'))->first();
        if ($existingEmployee) {
            return redirect()->route("employee.show.register")->with([
                "message" => "Korisnik vec postoji"
            ]);
        }
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->password = Hash::make($request->input('password'));
        $employee->save();
    }
}
