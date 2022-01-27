<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable=['experience_id','buyer_id','amount','status'];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'buyer_id');
    }
}
