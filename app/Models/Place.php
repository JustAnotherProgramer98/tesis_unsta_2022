<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable=['city_id','adress','coordenates','status'];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'picturable');
    }
    public function city()
    {
    	return $this->belongsTo(City::class);
    }
    public function getAdressAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
}
