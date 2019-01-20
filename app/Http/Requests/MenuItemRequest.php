<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuItemRequest extends FormRequest
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
            'category' => 'nullable|max:255',
            'product' => 'required|max:255',
            'price' => 'required|numeric',
            'hot_drink' => 'required|boolean',
            'adjust_ice' => 'required|boolean',
            'adjust_sugar' => 'required|boolean',
            'remarks' => 'nullable|max:255',
        ];
    }
}
