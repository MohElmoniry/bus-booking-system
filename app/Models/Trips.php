<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trips extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'from',
        'to',
        'datetime',
        'cost',
        'capacity',
        'bookingfor'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function busses(){
        return $this->hasOne(Busses::class);
    }
}
