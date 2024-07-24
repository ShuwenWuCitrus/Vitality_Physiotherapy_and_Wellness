<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function professionals()
    {
        return $this->belongsToMany(Professional::class, 'occupation_areas', 'service_id', 'professional_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
