<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('user'), // Exclude current user from unique check
            'password' => 'nullable|string|min:8', // Only require if creating a new user
            'profile_picture' => 'nullable|url',
            'headline' => 'nullable|string|max:255',
            'summary' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'skills' => 'nullable|array',
            'education_history' => 'nullable|array',
            'work_experience' => 'nullable|array',
            'connections' => 'nullable|array',
            'notifications' => 'nullable|array',
        ];
    }
}
