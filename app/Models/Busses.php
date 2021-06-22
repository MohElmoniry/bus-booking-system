<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Busses extends Model
{
    protected $fillable = [
        'name',
    ];

    public function seats(){
        return $this->hasMany(seats::class);
    }
    public function trips(){
        return $this->belongsTo(Trips::class);
    }
}
