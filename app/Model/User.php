<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'phone', 'is_admin', 'country_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCustomAttribute()
    {
        $id =auth()->user()->id;
        $option = new \stdClass();
        $option->user_options = UserOption::query()->where("user_id","=",$id)->get();
        $option->system_options = SystemOption::all();

        return $option;
    }
}
