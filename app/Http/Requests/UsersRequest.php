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
            'age' => 'required|date',
            'password' => 'required',
            'password_2' => 'same:password',
            'profile' => 'required|image|max:2000|'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'User\'s First Name is required',
            'last_name.required' => 'User\'s Last Name is required',
            'email.required' => 'User\'s Email is required',
            'username.required' => 'Username is required',
            'age.required' => 'User\'s Date of Birth is Required',
            'password.required' =>'User\'s password is required',
            'profile.required' => 'User\'s Profile Image is required',
            'password_2.same' => 'Password Does\'nt Match',
            'profile.image' => 'File must be an Image',
            'profile.max' => 'File should be less than 2MB',
            'age.date' => 'Date is Invalid',
            'telephone.required' => 'Telephone Number is Required',
            'telephone.numeric' => 'Telephone must be Numeric'
        ];
    }
}
