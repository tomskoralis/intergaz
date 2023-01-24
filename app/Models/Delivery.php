<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Locale;
use NumberFormatter;

class Delivery extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'route_id',
        'type',
        'status',
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function deliveryLines(): HasMany
    {
        return $this->hasMany(DeliveryLine::class);
    }

    public function getAddressAttribute(): string
    {
        return $this->address()->get()->value('title');
    }

    public function getDateAttribute(): string
    {
        return $this->route()->get()->value('date');
    }

    public function getPriceAttribute(?string $currencyType = 'EUR'): string
    {
        $price = 0;
        foreach ($this->deliveryLines()->get() as $item) {
            $price += $item->price * $item->qty;
        }

        return (new NumberFormatter(
            Locale::getDefault(),
            NumberFormatter::CURRENCY)
        )->formatCurrency($price, $currencyType ?? 'EUR');
    }

    public function getStatusFormattedAttribute(): string
    {
        return match ($this->status) {
            1 => 'Pending',
            2 => 'Finished',
            3 => 'Cancelled',
            default => 'Unknown',
        };
    }

    public function getClientNameAttribute(): string
    {
        return Client::find($this->address()->get()->value('client_id'))->name;
    }

    public function getItemsAttribute(): string
    {
        $items = [];
        foreach ($this->deliveryLines()->get() as $item) {
            $items [] = $item->item;
        }
        return implode(', ', $items);
    }
}
