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
            return $e->getMessage();
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
}
