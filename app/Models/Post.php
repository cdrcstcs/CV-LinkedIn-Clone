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
        'likes',
        'comments',
    ];

    protected $casts = [
        'likes' => 'array',
        'comments' => 'array',
    ];

    /**
     * Define the relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope a query to only include posts with a certain number of likes.
     */
    public function scopeWithMinLikes($query, $minLikes)
    {
        return $query->whereRaw('json_length(likes) >= ?', [$minLikes]);
    }

    /**
     * Scope a query to only include posts containing a specific keyword in content.
     */
    public function scopeWithKeyword($query, $keyword)
    {
        return $query->where('content', 'like', '%' . $keyword . '%');
    }
}
