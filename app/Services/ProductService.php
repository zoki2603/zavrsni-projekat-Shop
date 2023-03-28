<?php

namespace App\Services;

use RuntimeException;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Models\Order;

class ProductService
{

    public function storeProduct(ProductRequest $request, Product $product)
    {

        $product->name = $request->input("name");
        $product->price = $request->input("price");
        $product->description = $request->input("description");
        $product->quantity = $request->input("quantity");
        $product->category_id = $request->input("category_id");
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/img', $imageName);
            $product->image = $imageName;
        }


        $product->save();
    }

    public function buy($cartItems)
    {
        $order = new Order();
        $order->id_user = Auth::user()->id;
        $order->date =  now()->format('Y-m-d H:i:s');
        $order->save();

        foreach ($cartItems as $item) {
            // dd($item);
            // provjera dostupne količine proizvoda
            $product = Product::find($item['id']);
            if ($product->total_quantity < $item['quantity']) {
                return back()->withErrors(['error' => "Nedovoljna količina proizvoda na stanju."]);
            }

            $total = $item['price'] * $item['quantity'];

            $purchase = new Purchase();

            $purchase->id_user = Auth::user()->id;
            $purchase->id_product = $item['id'];
            $purchase->id_order = $order->id;
            $purchase->price = $item['price'];
            $purchase->quantity = $item['quantity'];
            $purchase->total_price = $total;
            $purchase->date = now()->format('Y-m-d H:i:s');
            $purchase->save();

            // ažuriranje količine proizvoda
            $product->total_quantity -= $item['quantity'];
            $product->save();
        }
    }
}
