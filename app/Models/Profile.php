<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'visibility',
        'current_position',
        'profile_url',
    ];

    /**
     * Define the relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Optionally, you can define a scope to filter profiles by visibility.
     */
    public function scopeVisible($query)
    {
        return $query->where('visibility', 'public'); // Adjust as needed
    }
}
