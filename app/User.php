<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'site_users';
    protected $primaryKey = 'user_id';

    public function hasPassword($password) {
        return Hash::check($password, $this->password);
    }

    public function scopeRole($query, $role = 'user') {
        return $query->where('user_role', $role);
    }

    public function calls() {
        return $this->hasMany(SiteCall::class, 'call_user');
    }

}
