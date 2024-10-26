<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'job_title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:255',
            'skills_required' => 'nullable|array',
            'skills_required.*' => 'string|max:100', // Each skill should be a string
            'posted_by' => 'required|exists:users,id',
        ];
    }
}
