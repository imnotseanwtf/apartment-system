<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'bills',
        'lived_in_id',
        'price',
    ];

    public function livedIn(): BelongsTo
    {
        return $this->belongsTo(LivedIn::class);
    }
}
