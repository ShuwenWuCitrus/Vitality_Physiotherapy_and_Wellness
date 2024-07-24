<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'occupation_areas', 'professional_id', 'service_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
