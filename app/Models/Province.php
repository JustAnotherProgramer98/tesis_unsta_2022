<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name','status','country_id'];

    public function cities()
    {
    	return $this->hasMany(City::class,'province_id');
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }
    public function getNameAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
}
