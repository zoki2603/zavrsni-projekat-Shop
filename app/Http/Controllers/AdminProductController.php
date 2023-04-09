<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

class AdminProductController extends Controller
{
    public function adminIndex()
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

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("layout.admin.product.edit_product", ["product" => $product, "categories" => $categories]);
    }
    public function update(ProductRequest $request, Product $product)
    {

        $service  = new ProductService();
        $success =  $service->storeProduct($request, $product);

        return redirect()->route("admin.index")->with("success", "Uspješno ste azurirali proizvod.");
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route("admin.index")->with("success", "Proizvd je uspsno obrisan");
    }
    public function searchProductsAdmin(Request $request)
    {
        $searchProduct = $request->input("search");

        $products = Product::where('name', "LIKE", '%' . $searchProduct . '%')->paginate(8);
        return view('layout.admin.admin_home', ['products' => $products]);
    }
}
