<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'film_categories', 'film_id', 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function releaseYear(): BelongsTo
    {
        return $this->belongsTo(ReleaseYear::class);
    }
}
