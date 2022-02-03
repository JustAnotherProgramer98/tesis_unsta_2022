<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    use HasFactory;

    protected $fillable=['code','discount_percent','status','user_id','experience_id'];

    //Quien usa el codigo
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
