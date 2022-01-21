<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','subtitle','description','place_id','languaje_id','host_id','reservation_id'];
    
    public function place()
    {
        return $this->belongsTo(Objetivo::class);
    }

    public function languaje()
    {
        return $this->belongsTo(Languaje::class);
    }

    public function host()
    {
        return $this->belongsTo(User::class,'host_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_experiences');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'picturable');
    }

}
