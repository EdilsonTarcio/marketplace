<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'banner' => ['image', 'max:2048'],
            'title_one' => ['string', 'max:200'],
            'title_two' => ['required', 'max:200'],
            'starting_price' => ['max:200'],
            'link' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'banner.required' => 'Por favor informe um arquivo de banner',
            'banner.max' => 'Arquivo muito grande!',
        ];
    }
}
