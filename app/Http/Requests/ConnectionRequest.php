<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConnectionRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'user_id_1' => 'required|exists:users,id',
            'user_id_2' => 'required|exists:users,id',
            'status' => 'required|string|in:pending,accepted,declined', // Adjust statuses as needed
        ];
    }
}
