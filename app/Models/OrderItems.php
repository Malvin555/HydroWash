<?php

namespace App\Models;

use App\Models\Laundry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'laundry_id',
        'ironing_id',
        'item_id',
        'quantity',
        'price_total',
        'created_who',
    ];

    public function laundry(): BelongsTo
    {
        return $this->belongsTo(Laundry::class);
    }

    public function ironing(): BelongsTo
    {
        return $this->belongsTo(Ironing::class);
    }

    public function itemType(): BelongsTo
    {
        return $this->belongsTo(ItemType::class);
    }
}
