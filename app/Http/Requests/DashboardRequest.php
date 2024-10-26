<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DashboardRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all authenticated users to make this request
    }

    public function rules()
    {
        return [
            'filter' => 'nullable|string|max:255', // Optional filter for posts
        ];
    }
}
