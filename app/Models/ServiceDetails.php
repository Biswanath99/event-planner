<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'image',
        'title',
        'description'
    ];

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return ($this->image)? url()->to('/' . $this->image): null;
    }

    public function service()
    {
         return $this->belongsTo(Services::class, 'service_id');
    }
}