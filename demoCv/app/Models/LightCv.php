<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightCv extends Model
{
    use HasFactory;

    public function personalInfo() {
        return $this->hasOne(PersonalInfo::class);
    }
    public function workExp() {
        return $this->hasMany(WorkExperience::class);
    }
    public function education() {
        return $this->hasMany(EducationalBackground::class);
    }
    public function skill() {
        return $this->hasOne(Skills::class);
    }
    public function projects() {
        return $this->hasOne(Projects::class);
    }
    public function links() {
        return $this->hasMany(relatedLinks::class);
    }
    public function user() {
        $this->belongsTo(User::class, 'user_id');
    }
}
