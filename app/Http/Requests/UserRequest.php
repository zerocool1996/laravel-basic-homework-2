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
            'email'         => 'email|required|max:255|unique:users,email,'. $this->id,
            'password'      => 'required|max:50|min:3',
            'confirm'       => 'same:password',
            'firstname'     => 'required|max:50',
            'lastname'      => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
