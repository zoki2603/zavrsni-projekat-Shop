<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class AdminCategoryProductController extends Controller
{
    public function index()
    {
        return view("layout.admin.category.category");
    }

    public function addCategory(CategoryRequest $request)
    {
        // $category = new Category();
        $service = new CategoryService();
        $service->addCategory($request, new Category());

        return  redirect()->route("index.category")->with("success", "Uspješno ste kreirali kategoriju.");
    }
}
