<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBikeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'features' => 'required|max:255',
            'cost' => 'required|numeric|between:0,10000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'category_id' => 'nullable|integer'
        ];
    }
}
