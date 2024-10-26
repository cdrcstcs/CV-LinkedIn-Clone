<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
            'likes' => 'nullable|array',
            'likes.*' => 'exists:users,id', // Assuming likes are user IDs
            'comments' => 'nullable|array',
            'comments.*' => 'string|max:1000', // Assuming comments are strings
        ];
    }
}
