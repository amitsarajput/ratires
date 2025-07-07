<?php

namespace ProductManager\Models;

use ProductManager\Models\Icon;
use ProductManager\Models\Tyre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Season extends Model
{
    use HasFactory;
    protected $fillable=['name','icon_id','slug'];
    protected $with = ['icon'];
    public function tyres(): HasMany
    {
        return $this->hasMany(Tyre::class);
    }    
    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }
}
