<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ProductRequest;

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
    public function comingSoon()
    {
        $response = Http::get('https://dummyjson.com/products');
        $products = $response->json();

        return view('layout.user.product.comingSoon', ['products' => $products]);
    }
    public function sort(Request $request)
    {

        $sortBy = $request->input('sort_by');
        if ($sortBy == 'name_asc') {
            $products = Product::orderBy('name', 'asc')->paginate(8);
        } elseif ($sortBy == 'name_desc') {
            $products = Product::orderBy('name', 'desc')->paginate(8);
        } elseif ($sortBy == 'price_asc') {
            $products = Product::orderBy('price', 'asc')->paginate(8);
        } elseif ($sortBy == 'price_desc') {
            $products = Product::orderBy('price', 'desc')->paginate(8);
        } else {
            $products = Product::paginate(8);
        }
        return view('layout.home', ['products' => $products]);
    }

    public function searchProducts(Request $request)
    {
        $searchProduct = $request->input("search");

        $products = Product::where('name', "LIKE", '%' . $searchProduct . '%')->paginate(8);
        return view('layout.home', ['products' => $products]);
    }
}
