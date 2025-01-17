<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'published_at',
        'category_id', // Assuming you have a Category model
    ];

    // Example of a scope
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    // Example of an accessor
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at->format('d-m-Y H:i:s'); 
    }

    // Example of a mutator
    public function setContentAttribute($value)
    {
        // Sanitize or preprocess the content before saving
        $this->attributes['content'] = strip_tags($value); 
    }

    // Example of a relationship (if you have a Category model)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}