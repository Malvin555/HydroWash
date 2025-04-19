<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public static function getFeedbacksWithUser($view)
    {
        $feedbacks = self::with('user')->orderBy('created_at', 'desc')->get();
        return view($view, compact('feedbacks'));
    }
}
