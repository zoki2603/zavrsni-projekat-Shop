<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        return view("layout.user.cart.cart");
    }

    public function addToCart(Product $product, Request $request)
    {

        $cartItems = session()->get('cartItems', []);
        // dd($cartItems);
        if (isset($cartItems[$product->id])) {
            $cartItems[$product->id]["quantity"]++;
        } else {
            $cartItems[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "description" => $product->description,
                "quantity" => $request->quantity,

            ];
        }
        session()->put("cartItems", $cartItems);
        return redirect()->back();
    }

    public function totalSum($products)
    {
        $total = 0;

        if ($products !== null) {
            foreach ($products as $product) {
                $total += floatval($product['price']) * intval($product['quantity']);
            }
        }

        return $total;
    }
    public function delete(Product $product)
    {
        if ($product) {

            $cartItems = session()->get('cartItems');

            if (isset($cartItems[$product->id])) {

                unset($cartItems[$product->id]);
                session()->put('cartItems', $cartItems);
            }
            return redirect()->back();
        }
    }
    // public function emptyCart()
    // {
    //     Session::forget('cartItems');
    //     return redirect()->back();
    // }
}
