<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    protected $fillable = ['name', 'password', 'role', 'phone'];

    protected $hidden = ['password', 'remember_token'];

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function mechanic() {
        return $this->hasOne(Mechanic::class);
    }
}