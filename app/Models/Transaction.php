<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
