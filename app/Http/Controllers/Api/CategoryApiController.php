<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResources;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        return CategoryResources::collection(
            Category::all()
        );
    }

    public function store(CategoryRequest $request)
    {
        $request->validated($request->all());

        $product = new Category();
        $service = new CategoryService();
        $service->addCategory($request, $product);

        return new CategoryResources($product);
    }
}
