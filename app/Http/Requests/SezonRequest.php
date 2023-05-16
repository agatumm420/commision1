<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SezonRequest extends FormRequest
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
            'sezon_se' => 'required|max:255',
            'id_se_old' => 'nullable|integer',
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
            'sezon_se.required' => 'Please enter a season',
            'sezon_se.max' => 'The season should not exceed 255 characters',
            'id_se_old.integer' => 'Old ID should be an integer value',
        ];
    }
}
