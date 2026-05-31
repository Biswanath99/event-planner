<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'service_id',
        'message'
    ];

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id');
    }
}


