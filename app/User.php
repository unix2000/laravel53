<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable
{
    use LaratrustUserTrait;
    //use Notifiable;
	use HasApiTokens, Notifiable;
    const STATUS_NORMAL = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }
    //场景
    public function scopeNormal($q){
        return $q->where('status',self::STATUS_NORMAL);
    }
    // 通过 phone 查找没有在禁用状态下的用户：
    public static function findForPassport($phone)
    {
        return \App\User::normal()
            ->where('phone', $phone)
            ->first();
    }
}
