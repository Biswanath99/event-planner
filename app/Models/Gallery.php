<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'gallery_category_id'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return ($this->image)
            ? url()->to('/' . $this->image)
            : null;
    }



    public function category()
    {
        return $this->belongsTo(GalleryCategories::class, 'gallery_category_id');
    }
}