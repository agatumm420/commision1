<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
            'match_date' => 'required|date',
            'score' => 'required|string',
            'team1_id' => 'required|integer|exists:teams,id',
            'team2_id' => 'required|integer|exists:teams,id',
            'link' => 'nullable|string',
            'rozgrywki_w_id' => 'required|integer|exists:rozgrywkiW,id_ro' // assuming the table name for RozgrywkiW model is 'rozgrywkiws'
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
