<?php

namespace App\Models;

use App\Traits\bindWithSlug;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory, Sluggable, bindWithSlug;

    protected $guarded = ['id'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
