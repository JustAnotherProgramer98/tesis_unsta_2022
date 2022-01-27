<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function province()
    {
    	return $this->belongsTo(Province::class);
    }
    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
