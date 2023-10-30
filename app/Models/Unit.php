<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'monthly_rent',
        'security_deposit',
        'advance_electricity',
        'advance_water',
        'description',
        'apartment_id',
    ];

    public function apartment(): BelongsTo
    {
        return $this->belongsTo(Apartment::class);
    }

    public function scopeOwned(Builder $query, $id) {
        $query->where('apartment_id', $id);
    }

    public function livedIns(): HasMany
    {
        return $this->hasMany(LivedIn::class);
    }
}
