<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'headline',
        'summary',
        'location',
        'industry',
        'skills',
        'education_history',
        'work_experience',
        'connections',
        'notifications',
    ];

    protected $casts = [
        'skills' => 'array',
        'education_history' => 'array',
        'work_experience' => 'array',
        'connections' => 'array',
        'notifications' => 'array',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define the connections relationship (many-to-many).
     */
    public function connections()
    {
        return $this->belongsToMany(
            User::class,
            'connections',
            'user_id_1', // Foreign key on the connections table for this user
            'user_id_2'  // Foreign key on the connections table for the related user
        )->withPivot('status'); // Include pivot data if needed
    }

    /**
     * Get all connections for the user (both directions).
     */
    public function allConnections()
    {
        return $this->connections()->union(
            $this->belongsToMany(User::class, 'connections', 'user_id_2', 'user_id_1')
        );
    }
}
