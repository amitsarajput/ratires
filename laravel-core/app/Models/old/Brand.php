<?php

namespace App\Models;

use App\Models\BrandExtraDetail;
use App\Models\Country;
use App\Models\SearchTag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable=['name','slug'];

    public function countries():BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'brand_country', 'brand_id', 'country_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function search_tags():BelongsToMany
    {
        return $this->belongsToMany(SearchTag::class, 'brand_search_tag', 'brand_id', 'search_tag_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function tyres(): HasMany
    {
        return $this->hasMany(Tyre::class);
    }

    public static function getBrandDataByCountry($countryId,$brandId)
    {
        return self::whereHas('countries',function ($query) use ($countryId) {
                    $query->where(['country_id'=> $countryId]);
                 })->get();
    }
    public function brandextradetails(): HasMany
    {
        return $this->hasMany(BrandExtraDetail::class);
    }

}
