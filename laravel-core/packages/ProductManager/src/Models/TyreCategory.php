<?php

namespace ProductManager\Models;

use ProductManager\Models\Tyre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TyreCategory extends Model
{
    use HasFactory;
    
    protected $fillable=['name','slug'];

    public function tyres(): BelongsToMany
    {
        return $this->belongsToMany(Tyre::class,'tyre_tyre_category','tyre_category_id','tyre_id')->withPivot('kram')->orderByPivot('kram', 'asc');
    }
}
