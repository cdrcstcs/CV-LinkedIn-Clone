<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * Define the connection relationship (many-to-many).
     */
    public function connections()
    {
        return $this->belongsToMany(User::class, 'connections', 'user_id', 'connection_id');
    }
}
