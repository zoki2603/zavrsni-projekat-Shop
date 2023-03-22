<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

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
}
