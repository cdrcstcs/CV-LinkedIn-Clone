<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date_time',
        'location',
        'host_user_id',
        'attendees',
    ];

    protected $casts = [
        'attendees' => 'array', // Cast attendees to an array
    ];

    /**
     * Define the relationship to the User model (host).
     */
    public function host()
    {
        return $this->belongsTo(User::class, 'host_user_id');
    }

    /**
     * Define the relationship to the User model (attendees).
     */
    public function attendees()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }
}
