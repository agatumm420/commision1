<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeczRuchRequest extends FormRequest
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
            'data_mr' => 'required|date',
            'wynik_mr' => 'required|string|max:255',
            'km_mr' => 'required|integer',
            'link_mr' => 'nullable|string|max:255',
            'id_se' => 'required|exists:sezon,id_se',
            'id_dr' => 'required|exists:druzyna,id_dr',
            'id_ro' => 'required|exists:rozgrywkiW,id_ro',
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
