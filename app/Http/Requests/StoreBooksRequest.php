<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBooksRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'isbn' => 'required|regex:/^[0-9]{9}[0-9X]$/',
            'author' => 'required',
            'imprenta' => 'required',
            'price' => 'required',
            'sellingAt' => 'required',
            // prepare isbn13 '/^97[89][0-9]{10}$/'
        ];
    }
}
