<?php

namespace ProductManager\Models;

use ProductManager\Models\Brand;
use ProductManager\Models\Country;
use ProductManager\Models\Region;
use ProductManager\Models\Icon;
use ProductManager\Models\SearchTag;
use ProductManager\Models\Season;
use ProductManager\Models\TyreCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tyre extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'region_id',
        'country_id',
        'brand_id',
        'search_tag_id',
        'season_id',
        'icon',
        'name',
        'preview_name',
        'category',
        'slug',
        'external_link',
        'description',
        'premium_tyre',
        'publish',
    ];

    public function search_tag(): BelongsTo
    {
        return $this->belongsTo(SearchTag::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function icons(): BelongsToMany
    {
        return $this->belongsToMany(Icon::class,'icon_tyre','tyre_id','icon_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function tyre_categories(): BelongsToMany
    {
        return $this->belongsToMany(TyreCategory::class,'tyre_tyre_category','tyre_id','tyre_category_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

}
