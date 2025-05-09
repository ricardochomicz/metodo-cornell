<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'keywords',
        'summary',
        'is_important',
        'notebook_id',
        'note_number',
    ];

    protected $casts = [
        'keywords' => 'array',
        'content' => 'array',
    ];

    public function notebook(): BelongsTo
    {
        return $this->belongsTo(Notebook::class);
    }

    public function highlights(): HasMany
    {
        return $this->hasMany(Highlight::class);
    }

    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            // Adiciona * ao final de cada palavra (para busca parcial)
            $searchTerms = collect(explode(' ', $search))
                ->filter() // Remove espaços em branco extras
                ->map(fn($term) => $term . '*') // Adiciona curinga
                ->implode(' '); // Junta de volta em uma string única

            $query->whereRaw("MATCH(title) AGAINST(? IN BOOLEAN MODE)", [$searchTerms]);
        });
    }

    // protected function content(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn(string $value) => str_replace('* ', '- ', $value),
    //     );
    // }


}
