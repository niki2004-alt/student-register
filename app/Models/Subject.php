<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function majors()
    {
        return $this->belongsToMany(Major::class, 'major_subject');
    }
}
