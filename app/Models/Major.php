<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Major extends Model
{
    // Optional: specify fillable if you use mass-assignment
    protected $fillable = ['name'];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'major_subject');
    }
    public function students()
{
    return $this->hasMany(Student::class, 'id');
}
}
