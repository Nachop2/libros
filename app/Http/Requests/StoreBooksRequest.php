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
            'isbn' => 'required',
            'author' => 'required',
            'imprenta' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'sellingAt' => 'required',
            // prepare isbn13 '/^97[89][0-9]{10}$/'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del libro es requerido.',
            'isbn.required' => 'El ISBN es requerido.',
//            'isbn.regex' => 'El ISBN debe seguir el formato correcto.',
            'author.required' => 'El autor es requerido.',
            'imprenta.required' => 'La imprenta es requerida.',
            'stock.required' => 'El stock es requerido.',
//            'stock.integer' => 'El stock debe ser un número entero.',
//            'stock.min' => 'El stock no puede ser negativo.',
            'price.required' => 'El precio es requerido.',
//            'price.numeric' => 'El precio debe ser un número.',
//            'price.min' => 'El precio debe ser mayor que cero.',
            'sellingAt.required' => 'El precio de venta es requerida.',
//            'sellingAt.date_format' => 'La fecha de venta debe estar en formato YYYY-MM-DD.',
        ];
    }
}
