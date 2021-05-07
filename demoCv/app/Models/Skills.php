<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    public function familiarLanguages() {
        return $this->hasMany(FamiliarLanguages::class);
    }
    public function coursesAndCertificates() {
        return $this->hasMany(CoursesAndCertificates::class);
    }
    public function expSkills() {
        return $this->hasMany(ExperimentalSkills::class);
    }
    public function achivements() {
        return $this->hasMany(Achievement::class);
    }

    public function cv() {
        return $this->belongsTo(LightCv::class, 'cv_id');
    }
}
