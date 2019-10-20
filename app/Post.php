<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'author_id', 'title', 'details', 'total_hit', 'status', 'is_featured', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
