<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Services\PurchaseService;
use Illuminate\Http\Request;

class AdminPurchaseController extends Controller
{
    public function allPurchases()
    {
        $service = new PurchaseService();
        $purchases =  $service->allPurchases();
        return view("layout.admin.purchase.purchase", ["purchases" => $purchases]);
    }

    public function singlePurchase($order_id)
    {

        $service = new PurchaseService();
        $purchases = $service->singlePurchase($order_id);


        return view("layout.admin.purchase.single_purchase", ["purchases" => $purchases]);
    }
}
