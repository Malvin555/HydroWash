<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemType extends Model
{
    use HasFactory;

    protected $table = 'item_types';
    protected $fillable = [
        'name_item',
        'price_item',
        'image_item',
        'role',
        'created_who',
    ];

    public function laundry(): HasMany
    {
        return $this->hasMany(Laundry::class, 'item_id');
    }

    public function ironing(): HasMany
    {
        return $this->hasMany(Ironing::class, 'item_id');
    }

    public function scopeType(Builder $query, string $type): Builder
    {
        $type = strtolower($type);

        if ($type === 'all' || $type === '') {
            return $query;
        }

        if (in_array($type, ['ironing', 'laundry'])) {
            return $query->where('role', $type);
        }

        return $query;
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(name_item) LIKE ?", [strtolower($search) . '%']);
        });

        return $query;
    }
}
