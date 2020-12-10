<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_login','ormawa','email','nama_lengkap', 'nim', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function agenda(){
        return $this->hasMany(AgendaKegiatan::class);
    }

    public function dokumentasi(){
        return $this->hasMany(Dokumentasi::class);
    }

    public function event(){
        return $this->hasMany(Event::class, "user_id");
    }

    public function profil(){
        return $this->hasMany(ProfilBEM::class);
    }

    public function sk(){
        return $this->hasMany(Sketerangan::class, "user_id");
    }
}
