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
        $success = $service->addCategory($request, new Category());
        return $success ? redirect()->route("admin.show.home")->with(["message" => "Uspresno ste kreirali kategoriju"]) : redirect()->back()->with(["message" => "Niste kreirali kategoriju"]);
    }
}
