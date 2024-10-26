<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'bio' => 'nullable|string|max:1000',
            'visibility' => 'required|boolean', // true for public, false for private
            'current_position' => 'nullable|string|max:255',
            'profile_url' => 'nullable|url|max:255',
        ];
    }
}
