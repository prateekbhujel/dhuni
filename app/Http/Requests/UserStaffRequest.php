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
        return true;
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
            'phone'     => 'required|string|min:10|max:30',
            'address'   => 'required|string',
            'status'    => 'required|in:Active,Inactive',
        ];
        //only while creating
        if($this->has('id')) {
            $rules['email'] = 'required|string|email|max:255|unique:admins|unique:users';
            $rules['password'] = 'required|string|min:8';
        }
        // Check if 'username' exists in the request data
        if ($this->has('username')) {
            $rules['username']  = 'required|string|max:15|unique:users';
            $rules['image']     = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
            $rules['about']     = 'required|min:50|max:500';
        }

        return $rules;
    }
}