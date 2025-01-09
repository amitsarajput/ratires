<?php

namespace App\Models;

use App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasFactory;
    protected $fillable=['name','code','slug'];

    public function countries():HasMany
    {
        return $this->hasMany(Country::class);
    }
}
