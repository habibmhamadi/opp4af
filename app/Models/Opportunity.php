<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'category_id',
        'fund_id',
        'organization',
        'image',
        'deadline',
        'description',
        'published'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deadline'
    ];

    protected static function boot()
    {
        parent::boot();
        Opportunity::creating(function ($opportunity) {
            $opportunity->slug = Str::slug($opportunity->name);
            if(Opportunity::where('slug', $opportunity->slug)->first())
            {
                $opportunity->slug = $opportunity->slug.'-'.((Opportunity::max('id') ?? 0) + 1);
            }
        });
        Opportunity::updating(function ($opportunity) {
            $opportunity->slug = Str::slug($opportunity->name);
            if(Opportunity::where('slug', $opportunity->slug))
            {
                $opportunity->slug = $opportunity->slug.'-'.$opportunity->id;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function education()
    {
        return $this->belongsToMany(Education::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    // Static functions

    public static function latest_scholarships($limit = 3)
    {
        return Opportunity::with('category', 'fund', 'locations')
            ->where('published', true)
            ->where('category_id', Category::where('name', 'Scholarship')->pluck('id'))
            ->where(function ($w){
                $w->where('deadline', '>', now())->orWhere('deadline');
            })
            ->latest()->take($limit)->get();
    }

    public static function deadlines($limit = 6)
    {
        return Opportunity::with('category')
            ->where('published', true)
            ->where(function ($w){
                $w->where('deadline', '>', now())->orWhere('deadline');
            })
            ->orderBy('deadline')->take($limit)->get();
    }

    public static function latests($limit = 6)
    {
        return Opportunity::with('category')
            ->where('published', true)
            ->where(function ($w){
                $w->where('deadline', '>', now())->orWhere('deadline');
            })
            ->latest()->take($limit)->get();
    }

    public static function related_opps($opportunity, $limit = 6)
    {
        return Opportunity::with('category')
            ->where('id', '!=', $opportunity->id)
            ->where('published', true)
            ->where('category_id', $opportunity->category_id)
            ->where(function ($w){
                $w->where('deadline', '>', now())->orWhere('deadline');
            })->latest()->take($limit)->get();
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

    public function getDeadline()
    {
        if($this->deadline)
        {
            return $this->deadline->diffForHumans();
        }
        return null;
    }

}
