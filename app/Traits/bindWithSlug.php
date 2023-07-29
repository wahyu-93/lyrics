<?php

namespace App\Traits;

trait bindWithSlug
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
