<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

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
        // $cartItems = session()->get('cartItems', []);

        foreach ($cartItems as $item) {
            $total = 0;
            $total += $item['price'] * $item['quantity'];

            $purchase = new Purchase();
            $purchase->id_user = Auth::user()->id;
            $purchase->id_product = $item['id'];
            $purchase->price = $item['price'];
            $purchase->quantity = $item['quantity'];
            $purchase->total_price = $total;
            $purchase->date = now()->format('Y-m-d H:i:s');
            $purchase->save();
        }
    }
}
