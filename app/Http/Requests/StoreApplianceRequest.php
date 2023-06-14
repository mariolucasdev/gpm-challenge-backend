<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApplianceRequest extends FormRequest
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
            'name'            => 'required|max:255',
            'description'     => 'required|max:255',
            'eletric_tension' => 'required|in:110v,220v',
            'brand_id'        => Rule::exists('brands', 'id'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'O campo nome é obrigatório.',
            'name.max'             => 'O campo deve ser menor que 255 catacteres.',
            'description.required' => 'O campo descrição é obrigatório.',
            'description.max'      => 'O campo descrição deve ser menor que 255 catacteres.',
            'eletric_tension.in'   => 'O campo tensão deve ser 110v ou 220v.',
            'brand_id.rule'        => 'Marca não localizada na base de dados.',
        ];
    }
}
