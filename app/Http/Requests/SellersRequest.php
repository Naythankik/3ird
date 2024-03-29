<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellersRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:sellers',
            'telephone' => 'required|unique:sellers|regex:/^([0-9\s\-\+\(\)]*)$/',
            'username' => 'required|unique:sellers',
            'address' => 'required|min:20',
            'age' => 'required|date',
            'password' => 'required',
            'password_2' => 'same:password',
            'profile' => 'required|image|max:2000|'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Seller\'s First Name is required',
            'last_name.required' => 'Seller\'s Last Name is required',
            'email.required' => 'Seller\'s Email is required',
            'username.required' => 'Username is required',
            'age.required' => 'Seller\'s Date of Birth is Required',
            'password.required' =>'Seller\'s password is required',
            'profile.required' => 'Seller\'s Profile Image is required',
            'password_2.same' => 'Password Does\'nt Match',
            'profile.image' => 'File must be an Image',
            'profile.max' => 'File should be less than 2MB',
            'age.date' => 'Date is Invalid',
            'telephone.required' => 'Telephone Number is Required',
            'telephone.numeric' => 'Telephone must be Numeric',
            'address.required' => 'Address is required',
            'address.min' => 'Address must is too short'
        ];
    }
}
