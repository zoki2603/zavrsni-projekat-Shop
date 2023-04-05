<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRegisterRequest;
use App\Http\Resources\EmpoloyeeResources;
use App\Models\Employee;
use App\Services\AuthEmployeeService;
use App\Services\EmployeeService;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    use HttpResponses;
    public function registerEmployee(EmployeeRegisterRequest $request)
    {

        $employee = new Employee();
        $service = new AuthEmployeeService();
        $service->registerEmployee($request, $employee);
        return new EmpoloyeeResources($employee);
    }
}
