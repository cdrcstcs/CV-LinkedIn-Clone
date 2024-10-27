<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship to the User model.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills'); // Specify pivot table if not using the default
    }
}
