<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedLinks extends Model
{
    protected $table= 'related_links';
    use HasFactory;
    public function cv() {
        return $this->belongsTo(LightCv::class, 'cv_id');
    }
}
