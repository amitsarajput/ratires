<?php

namespace ProductManager\Models;

use ProductManager\Models\Brand;
use ProductManager\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrandExtraDetail extends Model
{
    use HasFactory;

    protected $fillable=['country_id','brand_id','text','slider'];

    public function country(): BelongsTo
    { return $this->belongsTo(Country::class); }

    public function brand(): BelongsTo
    {  return $this->belongsTo(Brand::class); }

    public static function getBEDByCountryAndBrand($countryId, $brandId)
    {
        return self::where(['brand_id'=>$brandId, 'country_id'=>$countryId])->first();
    }
}
