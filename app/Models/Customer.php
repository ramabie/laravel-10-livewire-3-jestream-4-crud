<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'hobbies',
    ];

    protected $casts = [
        'hobbies' => 'array',
    ];

    public function service() : HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function rewards() : HasMany
    {
        return $this->hasMany(Reward::class);
    }
}
