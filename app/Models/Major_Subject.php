<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major_Subject extends Model
{
    use HasFactory;

    // If your table name is not 'major_subjects' (Laravel default plural), uncomment and set this:
    // protected $table = 'major_subject';

    protected $fillable = [
        'major_id',
        'subject_id',
    ];

    // Relationships

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
