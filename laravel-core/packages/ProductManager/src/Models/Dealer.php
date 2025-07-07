<?php

namespace ProductManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $fillable=['name','countrycode','continent','postdata','featured'];
}
