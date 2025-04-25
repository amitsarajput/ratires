<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Icon;
use App\Models\Tyre;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SearchTag extends Model
{
    use HasFactory;

    protected $fillable=['name','icon_id','slug','external_link'];

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'country_search_tag', 'search_tag_id', 'country_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'region_search_tag', 'search_tag_id', 'region_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function brands():BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brand_search_tag', 'search_tag_id', 'brand_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }
    public function tyres(): HasMany
    {
        return $this->hasMany(Tyre::class);
    }
    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }
    public static function getTagsByCountryAndBrand($countryId, $brandId)
    {
        // return self::whereHas('countries', function ($query) use ($countryId) {
        //         $query->where('country_id', $countryId);
        //     })
        //     ->whereHas('brands', function ($query) use ($brandId) {
        //         $query->where('brand_id', $brandId);
        //     })
        //     ->orderBy('kram')
        //     ->get();

            // Perform a join query to order by kram in pivot tables
        return self::join('country_search_tag', 'search_tags.id', '=', 'country_search_tag.search_tag_id')
        ->join('brand_search_tag', 'search_tags.id', '=', 'brand_search_tag.search_tag_id')
        ->where('country_search_tag.country_id', $countryId)
        ->where('brand_search_tag.brand_id', $brandId)
        ->orderBy('country_search_tag.kram')
        ->orderBy('brand_search_tag.kram')
        ->select('search_tags.*')
        ->get();
    }
}
