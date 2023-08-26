<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id_categoria' => 'required',
            'codigo' => 'required',
            'nombre' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'image' => 'required',
            'estatus' => 'required',
        ];
    }
}