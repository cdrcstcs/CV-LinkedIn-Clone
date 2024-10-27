<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'likes', // Now an integer
    ];

    protected $casts = [
        'likes' => 'integer', // Cast likes as an integer
    ];

    /**
     * Define the relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship to the Comment model.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Scope a query to only include posts with a certain number of likes.
     */
    public function scopeWithMinLikes($query, $minLikes)
    {
        return $query->where('likes', '>=', $minLikes); // Updated for integer likes
    }

    /**
     * Scope a query to only include posts containing a specific keyword in content.
     */
    public function scopeWithKeyword($query, $keyword)
    {
        return $query->where('content', 'like', '%' . $keyword . '%');
    }
}
