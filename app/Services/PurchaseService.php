<?php

namespace App\Services;

use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class PurchaseService
{

    public function allPurchases()
    {

        $allPurchase = DB::table("purchases")
            ->join("users", "purchases.id_user", "=", "users.id")
            ->select(DB::raw('distinct purchases.date'), 'users.first_name', 'users.last_name', 'status', 'id_order', 'purchases.date')
            ->orderByDesc('purchases.date')
            ->get();
        return $allPurchase;
    }

    public function singlePurchase($order_id)
    {
        $onePurchase = DB::table("purchases")
            ->join("users", "purchases.id_user", "=", "users.id")
            ->join("products", "purchases.id_product", "=", "products.id")
            ->where("purchases.id_order", "=", $order_id)
            ->select("purchases.*", "users.*", "products.*")
            ->get();

        if ($onePurchase === null) {
            return null;
        }
        return $onePurchase;
    }

    public function updateOrderStatus($order_id)
    {
        $purchases = Purchase::where('id_order', $order_id)->get();
        foreach ($purchases as $purchase) {
            $purchase->status = 'send';
            $purchase->save();
        }
    }
}
