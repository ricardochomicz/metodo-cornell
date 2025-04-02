<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Highlight extends Model
{
    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class);
    }
}
