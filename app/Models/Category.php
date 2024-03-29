<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['title','slug','description','status'];

    public function experiences()
    {
        return $this->belongsToMany(Experience::class,'categories_experiences');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'picturable');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
