<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'short_description',
        'image',
        'published',
        'view'
    ];

    protected static function boot()
    {
        parent::boot();
        Post::creating(function ($post) {
            $post->slug = Str::slug($post->name);
            if(Post::where('slug', $post->slug)->first())
            {
                $post->slug = $post->slug.'-'.((Post::max('id') ?? 0) + 1);
            }
        });
        Post::updating(function ($post) {
            $post->slug = Str::slug($post->name);
            if(Post::where('slug', $post->slug)->where('id', '!=', $post->id)->first())
            {
                $post->slug = $post->slug.'-'.$post->id;
            }
        });
    }

    public function getImageUrl()
    {
        if(!$this->image) return null;
        if(preg_match('/http.*/', $this->image))
        {
            return $this->image;
        }
        return route('home').'/images/'.$this->image;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
