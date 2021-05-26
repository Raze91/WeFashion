<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'string',
            "size" => 'required|' . Rule::in(['XS','S','M','L','XL']),
            "price" => 'numeric',
            'category_id' => 'integer',
            'published' => 'boolean',
            'discount' => 'boolean',
            'picture' => 'image|max:3000',
        ];
    }
}
