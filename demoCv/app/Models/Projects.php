<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    public function researchsAndArticles() {
        return $this->hasMany(ResearchAndArticles::class, 'project_id');
    }
    public function practicalProjects(){
        return $this->hasMany(PracticalProject::class, 'project_id');
    }
    public function cv() {
        $this->belongsTo(LightCv::class, 'cv_id');
    }
}
