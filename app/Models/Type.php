<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'name',
    ];

    public function service() : HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function car() : BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
