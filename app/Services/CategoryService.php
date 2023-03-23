<?php

namespace App\Services;


use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryService
{


    public function addCategory(CategoryRequest $request, Category $category)
    {

        $category->name = $request->input("name");
        $success = $category->save();
        return $success ? true : false;
    }
}
