<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Education;
use App\Models\Area;
use App\Models\Organization;
use App\Models\Fund;
use App\Models\Location;

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
}
