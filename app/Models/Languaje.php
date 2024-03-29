<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languaje extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function experiences()
    {
        return $this->belongsToMany(Experience::class,'experiencie_languaje');
    }
}
