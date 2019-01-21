<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'menu_id' => 'required|exists:menus,id',
            'contact_number' => 'required|max:20',
            'location' => 'required|max:255',
            'arrive_at' => 'nullable|date',
            'deadline' => 'nullable|date',
            'limit_amount' => 'required|numeric',
        ];
    }
}
