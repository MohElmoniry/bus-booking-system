<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trips extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'from',
        'to',
        'datetime',
        'cost',
        'capacity'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function busses(){
        return $this->hasOne(Busses::class);
    }
}
