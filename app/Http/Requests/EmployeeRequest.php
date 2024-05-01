<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->id){
            $rule = [
                'name' => 'required|string|min:4|max:255',
                'mobile_no' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
                'email' => 'required|string|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            ];
        }else{
            $rule = [
                'name' => 'required|string|min:4|max:255',
                'mobile_no' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
                'email' => 'required|string|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => 'Username is required',
            'mobile_no.required' => 'Mobile number is required',
            'email.required' => 'Email Id is required',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm Password is required',
        ];
    }
}
