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
        'organization_id',
        'website',
        'apply_link',
        'reference',
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

    public function organization()
    {
        return $this->belongsTo(Organization::class);
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
            ->where('deadline', '>', now())
            ->latest()->take($limit)->get();
    }

    public static function deadlines($limit = 6)
    {
        return Opportunity::with('category')
            ->where('published', true)
            ->where('deadline', '>', now())
            ->orderBy('deadline')->take($limit)->get();
    }

    public static function latests($limit = 6)
    {
        return Opportunity::with('category')
            ->where('published', true)
            ->where('deadline', '>', now())
            ->latest()->take($limit)->get();
    }

    public static function related_opps($category_id, $limit = 4)
    {
        return Opportunity::with('category')
            ->where('published', true)
            ->where('deadline', '>', now())
            ->where('category_id', $category_id)
            ->latest()->take($limit)->get();
    }

}
