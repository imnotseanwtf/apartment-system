<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable;

class Expense extends Model implements Auditable
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'bills',
        'lived_in_id',
        'price',
        'start_date',
        'end_date'
    ];

    public function livedIn(): BelongsTo
    {
        return $this->belongsTo(LivedIn::class);
    }

    public function scopeOwned(Builder $query, $id)
    {
        $query->where('lived_in_id', $id);
    }
}
