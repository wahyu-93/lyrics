<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug'];

    public function bands()
    {
        return $this->belongsToMany(Band::class, 'band_genre');
    }
}
