<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookbook extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function recipes() 
    {
        return $this->belongsToMany(Recipe::class, 'cookbook_recipe');
    }
}
