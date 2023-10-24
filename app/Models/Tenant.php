<?php

namespace App\Models;

use App\Models\Apartments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'occupation',
        'number',
        'email',
        'picture'
    ];

    public function livedIn() : HasOne
    {
        return $this->hasOne(LivedIn::class);
    }

    public function expense() : HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
