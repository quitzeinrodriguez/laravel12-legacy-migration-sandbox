<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Enums\CommentType;

class Comment extends Model
{
    protected $fillable = [
        'texto',
        'categoria',
    ];

    protected $casts = [
        'categoria' => CommentType::class,
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
