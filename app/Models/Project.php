<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function projectGalleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }
}
