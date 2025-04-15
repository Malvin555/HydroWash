<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
