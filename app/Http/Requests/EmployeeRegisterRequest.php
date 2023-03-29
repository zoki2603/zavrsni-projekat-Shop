<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRegisterRequest extends FormRequest
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
            "first_name" => ['required', 'string', 'max:255'],
            "last_name" => ['required', 'string', 'max:255'],
            "email" => ['required', 'email', 'max:255'],
            "password" => ['required', 'string', 'max:255'],
        ];
    }
}
