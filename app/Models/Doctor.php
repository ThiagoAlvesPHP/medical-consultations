<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'city_id',
        'name',
        'specialty',
    ];

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
