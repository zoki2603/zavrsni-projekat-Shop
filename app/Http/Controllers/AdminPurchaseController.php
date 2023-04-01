<?php

namespace App\Http\Controllers;

use App\Mail\OrderResponseMail;
use App\Models\Product;
use App\Models\Purchase;
use App\Services\PurchaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendMail($order_id)
    {
        $purchases = Purchase::where('id_order', $order_id)->get();
        foreach ($purchases as $purchase) {
            $purchase->status = 'send';
            $purchase->save();
        }
        Mail::to('zoki2603@gmail.com')->send(new OrderResponseMail($purchases));
        return redirect()->route("all.purchases");
    }
    public function sendOrder($order_id)
    {
        $service = new PurchaseService();
        $service->updateOrderStatus($order_id);

        return redirect()->route("all.purchases");
    }
}
