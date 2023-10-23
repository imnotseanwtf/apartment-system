<?php

namespace App\Models;

use App\Models\Tenant;
use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LivedIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'advance_deposit',
        'apartment_id',
        'start_date',
        'end_date',
    ];

    public function tenants()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function apartment(): BelongsTo
    {
        return $this->belongsTo(Apartment::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
