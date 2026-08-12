<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {
    protected $fillable = ['user_id', 'vehicle_id', 'mechanic_id', 'appointment_date', 'appointment_time', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function mechanic() {
        return $this->belongsTo(Mechanic::class);
    }
}