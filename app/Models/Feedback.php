<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Bus;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $fillable = [
        'user_id',
        'star_rating',
        'comment',
        'created_who',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getFeedbacksWithUser($view, $amount = null)
    {
        $feedbacks = self::with('user')->orderBy('created_at', 'desc')
            ->when($amount, function ($query, $amount) {
                return $query->take($amount);
            })
            ->get();

        return view($view, compact('feedbacks'));
    }

    public function scopeStarRating(Builder $query, $starRating): Builder
    {
        if (in_array($starRating, [1, 2, 3, 4, 5])) {
            return $query->where('star_rating', $starRating);
        }

        return $query;
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->when($search ?? false, function ($query, $search) {
            $query->whereRaw("LOWER(comment) LIKE ?", [strtolower($search) . '%'])
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->whereRaw("LOWER(name) LIKE ?", [strtolower($search) . '%']);
                });
        });

        return $query;
    }
}
