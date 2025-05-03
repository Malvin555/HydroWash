<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ironing extends Model
{
    use HasFactory;

    protected $table = 'ironing';
    protected $fillable = [
        'user_id',
        'order_code',
        'name_ironing',
        'price_ironing',
        'amount_item',
        'estimation',
        'retrieval_method',
        'status_transaction',
        'status_report',
        'address_taking',
        'address_delivery',
        'status',
        'notes_ironing',
        'created_who',
    ];

    public function itemType(): BelongsTo
    {
        return $this->belongsTo(ItemType::class, 'item_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function canceled(): HasMany
    {
        return $this->hasMany(Canceled::class);
    }

    public function scopeStatus(Builder $query, string $status): Builder
    {
        if (in_array($status, ['pending', 'process', 'completed'])) {
            return $query->where('status', $status);
        }

        return $query;
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(name_ironing) LIKE ?", [strtolower($search) . '%'])
                ->orWhereRaw("LOWER(address_delivery) LIKE ?", [strtolower($search) . '%']);
        });

        return $query;
    }

    public function scopeIroningSearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(name_ironing) LIKE ?", [strtolower($search) . '%'])
                ->orWhereRaw("LOWER(retrieval_method) LIKE ?", [str_replace(' ', '_', strtolower($search)) . '%'])
                ->orWhereHas('itemType', function ($q) use ($search) {
                    $q->whereRaw("LOWER(name_item) LIKE ?", [strtolower($search) . '%']);
                });
        });

        return $query;
    }
}
