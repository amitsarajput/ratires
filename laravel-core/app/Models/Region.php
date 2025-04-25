<?php

namespace App\Models;

use App\Models\Country;
use App\Models\SearchTag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;
    protected $fillable=['name','code','locale_code','slug','order','published'];
    
    public function countries():HasMany
    {
        return $this->hasMany(Country::class);
    }
    public function tyres():HasMany
    {
        return $this->hasMany(Tyre::class);
    }

    public function search_tags()
    {
        return $this->belongsToMany(SearchTag::class, 'region_search_tag', 'region_id', 'search_tag_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }
}
