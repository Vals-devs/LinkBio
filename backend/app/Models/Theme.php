<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Theme extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'primary_color',
        'background_color',
        'font_family',
        'layout_style'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
