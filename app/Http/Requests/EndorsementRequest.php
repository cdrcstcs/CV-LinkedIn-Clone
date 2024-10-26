<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EndorsementRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'skill_id' => 'required|exists:skills,id',
            'endorser_id' => 'required|exists:users,id',
        ];
    }
}
