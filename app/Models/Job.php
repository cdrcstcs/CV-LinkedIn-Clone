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
        'posted_by',
    ];

    /**
     * Define the relationship to the Company model.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Define the relationship to the User model (poster).
     */
    public function poster()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    /**
     * Define the relationship to the Skill model.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skill', 'job_id', 'skill_id');
    }

    /**
     * Scope a query to filter jobs by location.
     */
    public function scopeByLocation($query, $location)
    {
        return $query->where('location', 'like', '%' . $location . '%');
    }

    /**
     * Scope a query to filter jobs by a specific skill.
     */
    public function scopeWithSkill($query, $skill)
    {
        return $query->whereHas('skills', function ($query) use ($skill) {
            $query->where('name', $skill); // Adjust the condition based on your Skill model's fields
        });
    }
}
