<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'cpf',
        'phone',
    ];

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }
}
