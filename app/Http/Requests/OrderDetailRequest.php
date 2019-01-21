<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDetailRequest extends FormRequest
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
            'menu_item_id' => 'required|exists:menu_items,id',
            'amount' => 'required|numeric',
            'hot' => 'required|boolean',
            'ice' => 'required|numeric|between:0,1',
            'sugar' => 'required|numeric|between:0,1',
            'remarks' => 'nullable|max:255',
        ];
    }
}
