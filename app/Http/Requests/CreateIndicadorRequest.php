<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Indicador;

class CreateIndicadorRequest extends FormRequest
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
        return Indicador::$rules;
    }

    /**
     * Get the messages of validations that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return Indicador::$messages;
    }
}
