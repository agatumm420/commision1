<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User2Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'required|string|max:255|unique:user2',
            'password' => 'required|string|min:6',
            'km' => 'required|integer',
            'email' => 'required|email|max:255|unique:user2',
            'aktwn_u' => 'required|boolean',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
