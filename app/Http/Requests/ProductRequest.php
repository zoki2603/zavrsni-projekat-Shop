<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:255"],
            "price" => ["required", "numeric", "min:0"],
            "image" => ["nullable", "file", "mimes:png,jpg,jpeg"],
            "description" => ["required", "string"],
            "total_quantity" => ["required", "numeric", "min:0"],
            "category_id" => ["required", "integer", Rule::exists("categories", "id")]
        ];
    }
}
