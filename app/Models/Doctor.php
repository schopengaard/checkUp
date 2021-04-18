<?php

namespace checkUp\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $guard='doctor';
    protected $table = 'doctor';
    public $timestamps = false;

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

    public function getFullNameAttribute() {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getSpecialtyAttribute() {
        return $this->attributes['specialty'];
    }
}
