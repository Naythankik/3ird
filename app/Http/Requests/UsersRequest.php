<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'telephone' => 'required|numeric',
            'username' => 'required',
            'password' => 'required',
            'password_2' => 'required|same:password',
            'profile' => 'required|image|max:2000|'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'first name is required',
            'last_name.required' => 'last name is required',
            'email.required' => 'email is required',
            'username.required' => 'username is required',
            'age.required' => 'date of birth is required',
            'password.required' =>'password is required',
            'profile.required' => 'profile image is required',
            'password_2.required' => 'password confirmation is required',
            'password_2.same' => 'password does\'nt match',
            'profile.image' => 'file must be an image',
            'profile.max' => 'file should be less than 2MB',
            'age.date' => 'date is invalid',
            'telephone.required' => 'telephone number is required',
            'telephone.numeric' => 'telephone must be numeric'
        ];
    }
}
