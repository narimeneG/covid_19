<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignalRequest extends FormRequest
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
            'contenu' =>'required|string|min:10',
            'localisation' => 'required|string|min:3|max:255',
            'wilaya_id' => 'required',
            'cat_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
