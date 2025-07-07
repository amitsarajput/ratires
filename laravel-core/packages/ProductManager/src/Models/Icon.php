<?php

namespace ProductManager\Models;

use ProductManager\Models\SearchTag;
use ProductManager\Models\Season;
use ProductManager\Models\Tyre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Icon extends Model
{
    use HasFactory;
    protected $fillable=['name','class'];

    public function tyres(): BelongsToMany
    {
        return $this->belongsToMany(Tyre::class,'icon_tyre','icon_id','tyre_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }

    public function search_tags(): HasMany
    {
        return $this->hasMany(SearchTag::class);
    }
    public function season(): HasOne
    {
        return $this->hasOne(Season::class);
    }
    
}
