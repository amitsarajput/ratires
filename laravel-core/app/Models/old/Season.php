<?php

namespace App\Models;

use App\Models\Icon;
use App\Models\Tyre;
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
