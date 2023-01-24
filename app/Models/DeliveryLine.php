<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryLine extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'item',
        'price',
        'qty',
    ];

    public function addresses(): BelongsTo
    {
        return $this->belongsTo(Delivery::class);
    }
}
