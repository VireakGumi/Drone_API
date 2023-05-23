<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'farmer_id',
        'province_id'
    ];

    public function farmer():BelongsTo{
        return $this->belongsTo(Farmer::class);
    }

    public function province():BelongsTo{
        return $this->belongsTo(Province::class);
    }

    public function plans():HasMany{
        return $this->hasMany(Plan::class);
    }
    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
}
