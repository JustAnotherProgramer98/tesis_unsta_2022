<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'name',
        'email',
        'password',
        'gender',
        'phone',
        'address',
        'city',
        'province',
        'country',
        'dni_picture',
        'role_id',
        'email_verified_at',
        'verified',
        'surname',
        'cuit',
        'birthday',
        'deleted_at',
        'introducing_me',
        'experiences'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    public function role(){
        return $this->belongsTo(Role::class);
    }
    
    public function experiences()
    {
        return $this->hasMany(Experience::class,'host_id','id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'picturable');
    }
    public function sales()
    {
        return $this->hasMany(Sale::class,'buyer_id');
    }
    public function coupon_codes()
    {
        return $this->hasMany(CouponCode::class);
    }
    
    public function isAdmin()
    {
        if($this->role->name == "Admin"){
            return true;
        }
        return false;
    }
    
}
