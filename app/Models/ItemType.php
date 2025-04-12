<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
