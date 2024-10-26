<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'job_id' => 'required|exists:jobs,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string|max:255',
        ];
    }
}
