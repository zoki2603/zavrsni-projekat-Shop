<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products  = Product::paginate(8);
        return view('layout.home', ["products" => $products]);
    }
    public function showSingleProduct(Product $product)
    {
        return view("layout.user.product.single_product", ["product" => $product]);
    }
    public function buyAllProduct()
    {
        $cartItems = session()->get('cartItems', []);
        $service = new ProductService();
        // dd($cartItems);
        $service->buy($cartItems);
        session()->forget('cartItems');
        return redirect()->route("home");
    }
    public function store(ProductRequest $request)
    {
        $service = new ProductService();
        $product = new Product();
        $service->storeProduct($request, $product);
        return redirect()->route("home");
    }
}
