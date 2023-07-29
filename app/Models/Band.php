<?php

namespace App\Models;

use App\Traits\bindWithSlug;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory, Sluggable, bindWithSlug;

    protected $guarded = ['id'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'band_genre');
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
