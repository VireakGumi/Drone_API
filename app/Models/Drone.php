<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'user_id',
        'plan_id',
        'instruction_id'
    ];

    // static function store($request){
    //     $drone = Drone::create([
    //         'name'=> $request->name,
    //         'type'=> $request->type,
    //         'payload'=> $request->payload,
    //         'battery'=> $request->battery,
    //         'fligth_range'=> $request->fligth_range,
    //         'weight'=> $request->weight,
    //         'location_id'=> $request->location_id,
    //         'user_id'=> $request->user_id,
    //     ]);
    // }

    public function instruction():BelongsTo{
        return $this->belongsTo(Instruction::class);
    }

    public function plan():BelongsTo{
        return $this->belongsTo(Plan::class);
    }
    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
    public function locations():HasOne{
        return $this->hasOne(Location::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
