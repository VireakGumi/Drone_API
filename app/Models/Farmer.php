<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farmer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function drones():HasMany {
        return $this->hasMany(Drone::class);
    }
    public function farms():HasMany {
        return $this->hasMany(Farm::class);
    }
}
