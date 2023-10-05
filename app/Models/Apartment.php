<?php

namespace App\Models;

use App\Models\LivedIn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'base_price',
        'description',
    ];

    public function livedIns(): HasMany
    {
        return $this->hasMany(LivedIn::class);
    }
}
