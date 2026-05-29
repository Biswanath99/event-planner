<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sub_title',
        'border_image',
        'title',
        'description',
        'image',
        'status'
    ];

    protected $appends = ['image_url','border_image_url'];
    public function getImageUrlAttribute()
    {
        return ("{$this->image}") ? url()->to('/' . "{$this->image}") : null;
    }

    public function getBorderImageUrlAttribute()
    {
        return ("{$this->border_image}") ? url()->to('/' . "{$this->border_image}") : null;
    }

}
