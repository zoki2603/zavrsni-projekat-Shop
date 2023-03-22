<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;

class AdminProductController extends Controller
{
    public function index()
    {
        $products  = Product::paginate(8);
        return view('layout.admin.admin_home', ["products" => $products]);
    }
    public function create()
    {

        $products = Product::all();
        return view("layout.admin.admin_home", ["products" => $products]);
    }
    public function storeProduct(ProductRequest $request)
    {
        $product = new Product();
        $service = new ProductService();
        $success = $service->storeProduct($request, $product);
        return $success ? redirect()->route("")->with(["message" => "Podaci su uspesno sacuvani"]) : redirect()->back()->with(["message" => "Proizvod nije usporesno sacuvan"]);
    }
}
