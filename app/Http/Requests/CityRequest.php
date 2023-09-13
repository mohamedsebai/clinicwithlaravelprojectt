<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'city_name'   => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'city_name.required' => 'The :attribute can not be empty you have to write somthing on it',
            'city_name.max' => 'The :attribute can not be more than 50 cahrs make it small bit',
        ];
    }
}
