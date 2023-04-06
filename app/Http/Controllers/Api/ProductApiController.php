<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResources;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductApiController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResources::collection(
            Product::all()
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated($request->all());

        $product = new Product();
        $service = new ProductService();
        $service->storeProduct($request, $product);

        return new ProductResources($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        try {
            return new ProductResources($product);
        } catch (Exception $e) {
            return $this->error('', "This product does not exist ", 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return new ProductResources($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->success("", "successful deletion", 200);
    }
    public function searchApiProduct(Request $request)
    {
        $category = $request->input('search');

        $search = Http::get('https://dummyjson.com/products/search?q=' . $category);
        $products = $search->json();

        return view('layout.user.product.comingSoon', ['products' => $products]);
    }
}
