<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endorsement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skill_id',
        'endorser_id',
    ];

    /**
     * Define the relationship to the User model (the user who is endorsed).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship to the Skill model.
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    /**
     * Define the relationship to the Endorser (User) model.
     */
    public function endorser()
    {
        return $this->belongsTo(User::class, 'endorser_id');
    }
}
