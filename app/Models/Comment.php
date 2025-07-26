<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['message', 'film_id', 'user_id'];
    
    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class)->where('is_like', true);
    }

    public function dislikes()
    {
        return $this->hasMany(CommentLike::class)->where('is_like', false);
    }

    public function userVote($userId)
    {
        return $this->hasOne(CommentLike::class)->where('user_id', $userId);
    }
}
