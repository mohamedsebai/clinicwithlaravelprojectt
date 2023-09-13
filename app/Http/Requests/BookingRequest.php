<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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

            'name' => 'required|max:50|string',
            'email' => 'required|max:255',
            'phone' => 'required|max:50',
        ];
    }

    public function messages()
    {
        $messageRequiredContent = 'The :attribute can not be empty you have to write somthing on it';
        return [
            'name.required'     => $messageRequiredContent,
            'email.required'    => $messageRequiredContent,
            'phone.required'    => $messageRequiredContent,
        ];
    }
}
