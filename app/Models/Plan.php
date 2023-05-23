<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'dateTime',
        'area',
        'spray_density',
        'farm_id'
    ];
    public function farmer():BelongsTo{
        return $this->belongsTo(Farmer::class);
    }
    public function instructions():BelongsToMany{
        return $this->belongsToMany(Drone::class,'instruction');
    }
}
