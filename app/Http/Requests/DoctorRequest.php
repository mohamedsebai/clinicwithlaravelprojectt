<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
     */    public function rules()
    {
        return [
            'name' => 'required|max:50|string',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:50',
            'summary' => 'required|max:255',
            'image'   => ['mimes:jpg,png,jif,jped', 'max:5000', 'dimensions:min_width=100,min_height=100'],
        ];
    }

    public function messages()
    {
        $messageRequiredContent = 'The :attribute can not be empty you have to write somthing on it';
        return [
            'name.required'     => $messageRequiredContent,
            'email.required'    => $messageRequiredContent,
            'phone.required'    => $messageRequiredContent,
            'summary.required'    => $messageRequiredContent,


            'image.mimes' => 'The :attribute it\'s not an image please chosse an image',
            'image.max' => 'The :attribute can not be more than 4mb make it small bit',
            'image.dimensions' => 'The :attribute must be width at least 100 and same as height'


        ];
    }
}
