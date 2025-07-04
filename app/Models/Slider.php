<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Slider extends Model
{
    public function film(): HasOne
    {
        return $this->hasOne(Film::class, 'id', 'film_id');
    }
}
