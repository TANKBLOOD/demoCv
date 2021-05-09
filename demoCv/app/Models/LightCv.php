<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightCv extends Model
{
    use HasFactory;

    public function personalInfo() {
        return $this->hasOne(PersonalInfo::class, 'cv_id');
    }
    public function workExp() {
        return $this->hasMany(WorkExperience::class, 'cv_id');
    }
    public function education() {
        return $this->hasMany(EducationalBackground::class, 'cv_id');
    }
    public function skill() {
        return $this->hasOne(Skills::class, 'cv_id');
    }
    public function projects() {
        return $this->hasOne(Projects::class, 'cv_id');
    }
    public function links() {
        return $this->hasMany(RelatedLinks::class, 'cv_id');
    }
    public function user() {
        $this->belongsTo(User::class, 'user_id');
    }
}
