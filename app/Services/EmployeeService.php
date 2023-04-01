<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Purchase;

class EmployeeService
{

    public function updateOrderStatus($order_id)
    {
        $purchases = Purchase::where('id_order', $order_id)->get();
        foreach ($purchases as $purchase) {
            $purchase->status = 'ready';
            $purchase->save();
        }
    }
}
