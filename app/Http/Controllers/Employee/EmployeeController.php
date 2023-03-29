<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Services\PurchaseService;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function employeeDashbord()
    {
        $service = new PurchaseService();
        $orders =  $service->allPurchases();
        return view("layout.employee.dashbord", ["orders" => $orders]);
    }

    public function order($order_id)
    {
        $service = new PurchaseService();
        $orders = $service->singlePurchase($order_id);


        return view("layout.employee.order", ["orders" => $orders]);
    }
}
