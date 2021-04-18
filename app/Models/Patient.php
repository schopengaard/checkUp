<?php

namespace checkUp\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use Notifiable;

    protected $guard='patient';
    protected $table = 'patient';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'first_name', 'last_name', 'age', 'care_card', 'email',  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute() {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getIDAttribute() {
        return $this->attributes['id'];
    }
}
