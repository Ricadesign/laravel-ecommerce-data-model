<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $hidden = ['media'];
    protected $appends = ['images'];

    public function features()
    {
        return $this->hasOne(Features::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    public function scopeVisible(Builder $query)
    {
        return $query->whereVisible(true);
    }

    public function getImagesAttribute()
    {
        return $this->getMedia('images')->map(function(Media $media) {
            return $media->getFullUrl();
        });
    }
}
