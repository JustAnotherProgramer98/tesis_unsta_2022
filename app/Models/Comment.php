<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['body','user_id','experience_id','stars'];

    public function experience()
    {
        return $this->belongsTo(Experience::class,'experience_id','id','experience');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
