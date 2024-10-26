<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'job_title',
        'description',
        'location',
        'skills_required',
        'posted_by',
    ];

    protected $casts = [
        'skills_required' => 'array', // Cast skills required to an array
    ];

    /**
     * Define the relationship to the Company model.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Define the relationship to the User model (poster).
     */
    public function poster()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
