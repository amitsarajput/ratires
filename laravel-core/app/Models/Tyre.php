<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Country;
use App\Models\Icon;
use App\Models\SearchTag;
use App\Models\Season;
use App\Models\TyreCategory;
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
