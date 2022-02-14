<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','slug','subtitle','description','price','quantity_clients','status','place_id','host_id','reservation_id'];
    
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function languajes()
    {
        return $this->belongsToMany(Languaje::class,'experiencie_languaje');
    }

    public function host()
    {
        return $this->belongsTo(User::class,'host_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function coupon_codes()
    {
        return $this->hasMany(CouponCode::class);
    }


}
