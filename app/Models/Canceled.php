<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Canceled extends Model
{
    use HasFactory;

    protected $table = 'canceled';
    protected $fillable = [
        'user_id',
        'laundry_id',
        'ironing_id',
        'issues',
        'created_who',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function ironing(): BelongsTo
    {
        return $this->belongsTo(Ironing::class);
    }

    public function laundry(): BelongsTo
    {
        return $this->belongsTo(Laundry::class);
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(issues) LIKE ?", [strtolower($search) . '%'])
                ->orWhereHas('ironing', function ($q) use ($search) {
                    $q->whereRaw("LOWER(name_ironing) LIKE ?", [strtolower($search) . '%']);
                })
                ->orWhereHas('laundry', function ($q) use ($search) {
                    $q->whereRaw("LOWER(name_laundry) LIKE ?", [strtolower($search) . '%']);
                });
        });

        return $query;
    }
}
