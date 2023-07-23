<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
