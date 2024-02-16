<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

        if ($this->isMethod('post')) {
            $rules += [
                'email'     => 'required|string|email|max:255|unique:admins|unique:users',
                'password'  => 'required|string|min:8',
            ];

            if ($this->has('username')) {
                $rules['username'] = [
                    'required',
                    'string',
                    'max:15',
                    Rule::unique('users')->ignore($this->user->id),
                    'regex:/^[a-z0-9\/?"\':;.]+$/',
                ];

                $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048';
                $rules['about'] = 'required|min:50|max:500';
            }
        }

        // Validation rules for editing
        if ($this->isMethod('patch')) {
            if ($this->filled('username')) {
                $rules['username'] = [
                    'required',
                    'string',
                    'max:15',
                    Rule::unique('users')->ignore($this->user->id),
                    'regex:/^[a-z0-9\/?"\':;.]+$/',
                ];
            }
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'username.regex' => 'Username should not have special characters and Any Capital letters.',
        ];
    }
}
