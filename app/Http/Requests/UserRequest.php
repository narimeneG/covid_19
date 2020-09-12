<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nom' => 'required|string|min:3|max:255',
            'prenom' =>'required|string|min:3|max:255',
            'email' => 'required|regex:/^.+@.+$/i|unique:citoyens',
            'password' => 'required|string|min:6|confirmed',
            //'image' => 'image|mimes:jpeg,png,jpg,gif',
            'pro_id' => 'required',
            'com_id' => 'required',
        ];
    }
}
