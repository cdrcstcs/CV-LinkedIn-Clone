<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'date_time' => 'required|date',
            'location' => 'nullable|string|max:255',
            'host_user_id' => 'required|exists:users,id',
            'attendees' => 'nullable|array',
            'attendees.*' => 'exists:users,id', // Ensuring each attendee is a valid user
        ];
    }
}
