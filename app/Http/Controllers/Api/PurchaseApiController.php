<?php

namespace App\Http\Controllers\Api;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Services\PurchaseService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseResource;

class PurchaseApiController extends Controller
{
    public function allPurchase()
    {
        $purchase = Purchase::with(['user', 'product', 'order'])->get();
        return PurchaseResource::collection($purchase);
    }
    public function singlePurchase($order_id)
    {

        $purchase = Purchase::with(['user', 'product'])->where('id_order', '=', $order_id)->first();
        return new PurchaseResource($purchase);
    }
}
