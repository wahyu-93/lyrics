<?php

namespace App\Models;

use App\Traits\bindWithSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory, bindWithSlug;

    protected $guarded = ['id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
