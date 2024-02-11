<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $rules = [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:admins|unique:users',
            'password'  => 'require|string|min:8',
            'phone'     => 'required|string|max:30',
            'address'   => 'required|string',
            'status'    => 'required|in:Active,Inactive',
        ];

        // Check if 'username' exists in the request data
        if ($this->has('username')) {
            $rules['username']  = 'required|string|max:15|unique:users';
            $rules['image']     = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
            $rules['about']     = 'required|min:50|max:500';
        }

        return $rules;
    }
}
