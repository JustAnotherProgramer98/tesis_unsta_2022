<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable=['province','city','adress','coordenates'];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'picturable');
    }
}
