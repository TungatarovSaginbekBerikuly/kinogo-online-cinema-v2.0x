<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'film_categories', 'category_id', 'film_id');
    }
}
