<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'title',
        'url',
        'icon',
        'order',
        'is_active',
        'click_count'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
