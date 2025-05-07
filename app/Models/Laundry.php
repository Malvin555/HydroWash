<?php

namespace App\Models;

use App\Models\Canceled;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laundry extends Model
{
    use HasFactory;

    protected $table = 'laundry';
    protected $fillable = [
        'user_id',
        'name_laundry',
        'price_laundry',
        'amount_item',
        'estimation',
        'retrieval_method',
        'status_transaction',
        'status_report',
        'address_taking',
        'address_delivery',
        'status',
        'notes_laundry',
        'created_who',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class, 'laundry_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'laundry_id');
    }

    public function canceled(): HasMany
    {
        return $this->hasMany(Canceled::class, 'laundry_id');
    }

    public function scopeStatus(Builder $query, string $status): Builder
    {
        if ($status === 'none-completed') {
            return $query->where('status', '!=', 'completed');
        } elseif (in_array($status, ['pending', 'process', 'completed'])) {
            return $query->where('status', $status);
        }

        return $query;
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(name_laundry) LIKE ?", [strtolower($search) . '%'])
                ->orWhereRaw("LOWER(address_delivery) LIKE ?", [strtolower($search) . '%']);
        });

        return $query;
    }

    public function scopeLaundrySearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(name_laundry) LIKE ?", [strtolower($search) . '%'])
                ->orWhereRaw("LOWER(retrieval_method) LIKE ?", [str_replace(' ', '_', strtolower($search)) . '%'])
                ->orWhereHas('orderItems', function ($q) use ($search) {
                    $q->whereHas('itemType', function ($q2) use ($search) {
                        $q2->whereRaw("LOWER(name_item) LIKE ?", [strtolower($search) . '%']);
                    });
                });
        });

        return $query;
    }
}
