<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Images extends Model
{
      use HasFactory, SoftDeletes;

        protected $fillable = [
            'category_id',
            'image',
            'status'
        ];

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return ("{$this->image}") ? url()->to('/' . "{$this->image}") : null;
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

}
