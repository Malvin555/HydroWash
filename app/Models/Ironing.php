<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ironing extends Model
{
    use HasFactory;

    protected $table = 'ironing';
    protected $fillable = [
        'user_id',
        'item_id',
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
}
