<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryCategories extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'status'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return ($this->image)
            ? url()->to('/' . $this->image)
            : null;
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}