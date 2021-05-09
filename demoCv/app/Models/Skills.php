<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    public function familiarLanguages() {
        return $this->hasMany(FamiliarLanguages::class, 'skill_id');
    }
    public function coursesAndCertificates() {
        return $this->hasMany(CoursesAndCertificates::class, 'skill_id');
    }
    public function expSkills() {
        return $this->hasMany(ExperimentalSkills::class, 'skill_id');
    }
    public function achivements() {
        return $this->hasMany(Achievement::class, 'skill_id');
    }

    public function cv() {
        return $this->belongsTo(LightCv::class, 'cv_id');
    }
}
