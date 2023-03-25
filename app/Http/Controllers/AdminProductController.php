<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

class AdminProductController extends Controller
{
    public function index()
    {
        $products  = Product::paginate(8);
        return view('layout.admin.admin_home', ["products" => $products]);
    }
    public function create()
    {
        $categories = Category::all();

        return view("layout.admin.product.product", ["categories" => $categories]);
    }

    public function storeProduct(ProductRequest $request)
    {
        $product = new Product();
        $service = new ProductService();
        $success = $service->storeProduct($request, $product);
        return redirect()->route("show.add.product")->with(["success" => "Podaci su uspesno sacuvani"]);
    }
}
