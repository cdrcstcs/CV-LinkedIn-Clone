<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'read_status' => 'required|boolean', // true or false
        ];
    }
}
