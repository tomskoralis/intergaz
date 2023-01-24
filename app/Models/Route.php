<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date',
        'car_number',
        'status',
        'driver_name',
    ];

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }
}
