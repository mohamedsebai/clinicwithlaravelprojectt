<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    //protected $redirectRoute = 'majors.index';
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
            'title'   => 'required|max:50',
            'image'   => ['mimes:jpg,png,jif,jped', 'max:5000', 'dimensions:min_width=100,min_height=100']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The :attribute can not be empty you have to write somthing on it',
            'title.max' => 'The :attribute can not be more than 50 cahrs make it small bit',

            'image.required' => 'The :attribute can not be empty you have to write somthing on it',
            'image.mimes' => 'The :attribute it\'s not an image please chosse an image',
            'image.max' => 'The :attribute can not be more than 4mb make it small bit',
            'image.dimensions' => 'The :attribute must be width at least 100 and same as height'
        ];
    }
}
