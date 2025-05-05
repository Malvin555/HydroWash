<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $fillable = [
        'user_id',
        'laundry_id',
        'ironing_id',
        'price_transaction',
        'method',
        'user_transaction',
        'card_number',
        'postal_code',
        'bank_name',
        'created_who',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');    
    }

    public function ironing(): BelongsTo
    {
        return $this->belongsTo(Ironing::class, 'ironing_id');
    }

    public function laundry(): BelongsTo
    {
        return $this->belongsTo(Laundry::class, 'laundry_id');
    }

    public function scopeFilterTime(Builder $query, $monthYear): Builder
    {
        if (!$monthYear) return $query;

        try {
            $startDate = Carbon::createFromFormat('Y-m', $monthYear)->startOfMonth();
            $endDate = Carbon::createFromFormat('Y-m', $monthYear)->endOfMonth();

            return $query->whereBetween('created_at', [$startDate, $endDate]);
        } catch (\Exception $e) {
            return $query;
        }

    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(method) LIKE ?", [strtolower($search) . '%'])
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
