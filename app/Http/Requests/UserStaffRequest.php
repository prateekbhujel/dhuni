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

        // Validation rules for creation
        if ($this->isMethod('post')) {
            $rules += [
                'email'     => 'required|string|email|max:255|unique:admins|unique:users',
                'password'  => 'required|string|min:8',
            ];

            // Check if 'username' exists in the request data
            if ($this->has('username')) {
                $rules['username'] = 'required|string|max:15|unique:users';
                $rules['image'] = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
                $rules['about'] = 'required|min:50|max:500';
            }
        }

        // Validation rules for editing
        if ($this->isMethod('patch')) {
            // If user is authenticated as admin
            if (Auth::guard('admin')->check()) {
                // Admin can always change the username
                if ($this->filled('username')) {
                    $rules['username'] = ['required', Rule::unique('users','username')->whereNot('username',$this->username)];
                }
            } else {
                // User is a normal user
                // Check if username is being changed and enforce the 90 days policy
                if ($this->filled('username')) {
                    $lastUsernameChange = $this->user->username_changed_at;
                    $ninetyDaysAgo = now()->subDays(90);
                    if ($lastUsernameChange && $lastUsernameChange->greaterThan($ninetyDaysAgo)) {
                        // If the last username change was less than 90 days ago, prevent username change
                        $rules['username'] = 'required|string|max:15|not_changed_within_ninety_days';
                    } else {
                        // Allow username change if it's been over 90 days
                        $rules['username'] = 'required|string|max:15|unique:users,username,' . $this->user->id;
                    }
                }
            }
        }

        return $rules;
    }
}
