<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_1',
        'user_id_2',
        'status',
    ];

    /**
     * Define the relationship to the User model for user_id_1.
     */
    public function user1()
    {
        return $this->belongsTo(User::class, 'user_id_1');
    }

    /**
     * Define the relationship to the User model for user_id_2.
     */
    public function user2()
    {
        return $this->belongsTo(User::class, 'user_id_2');
    }
}
