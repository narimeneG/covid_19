<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'string|min:3|max:255',
            'contenu' =>'string|min:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'lien'=>'string',
            'sou_id'=>'required',
        ];
    }
}
