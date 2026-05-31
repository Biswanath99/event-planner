<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'border_image',
        'description'
    ];

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return ($this->border_image)? url()->to('/' . $this->border_image): null;
    }

    public function detail()
    {
        return $this->hasOne(ServiceDetails::class, 'service_id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}