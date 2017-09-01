<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please provide a first name.',
            'first_name.max' => 'Your first name has to be less than 255 characters.',
            'last_name.required' => 'Please provide a last name.',
            'lsat_name.max' => 'Your last name has to be less than 255 characters.',
            'email.required' => 'Please provide an email address.',
            'email.email' => 'Please provide an email address in the correct format.',
            'email.max' => 'Your email address must be less than 255 characters.',
            'email.unique' => 'This email address is already taken. Do you already have an account?',
            'password.required' => 'Please provide a password.',
            'password.min' => 'Your password must be more than 6 characters in length.',
        ];
    }
}
