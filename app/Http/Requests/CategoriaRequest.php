<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //como "true" todos estão autorizados a acessar esse request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200','unique:categorias,name'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor informe um nome para a categoria',
            'name.unique' => 'Já existe uma categoria com esse nome!',
        ];
    }
}
