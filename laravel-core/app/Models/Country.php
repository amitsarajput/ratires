<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\Region;
use App\Models\Tyre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable=['region_id','name','code','locale_code','slug','order','published'];
    
    public function region():BelongsTo
    {
       return $this->belongsTo(Region::class, 'region_id');
    }
    

    public function brands():BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brand_country', 'country_id', 'brand_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function search_tags()
    {
        return $this->belongsToMany(SearchTag::class, 'country_search_tag', 'country_id', 'search_tag_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function tyres(): HasMany
    {
        return $this->hasMany(Tyre::class);
    }
    
    public function brandextradetails(): HasMany
    {
        return $this->hasMany(BrandExtraDetail::class);
    }
}
