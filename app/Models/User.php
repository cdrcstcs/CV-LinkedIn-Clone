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
        // Removed skills, connections, notifications as arrays are managed through relationships
    ];

    protected $casts = [
        'skills' => 'array',
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
            'user_id_1',
            'user_id_2'
        )->withPivot('status');
    }

    /**
     * Get all connections for the user (both directions).
     */
    public function allConnections()
    {
        return $this->connections()->union(
            $this->belongsToMany(User::class, 'connections', 'user_id_2', 'user_id_1')
                ->withPivot('status') // Including status in the pivot
        );
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user')->withTimestamps();
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user')->withTimestamps();
    }

    /**
     * Define the education relationship (many-to-many).
     */
    public function education()
    {
        return $this->belongsToMany(Education::class, 'education_user')->withTimestamps();
    }

    /**
     * Define the skills relationship (many-to-many).
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills')->withTimestamps(); // Specify pivot table
    }
}
