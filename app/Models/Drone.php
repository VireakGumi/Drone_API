<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'payload',
        'battery',
        'fligth_range',
        'weight',
        'location_id',
        'user_id'
    ];

    public function instructions():BelongsToMany{
        return $this->belongsToMany(Plan::class,'instruction');
    }
    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
    public function locations():HasMany{
        return $this->hasMany(Location::class);
    }
    public function users():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
