<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function ingredients() 
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient');
    }

    public function cookbooks() 
    {
        return $this->belongsToMany(Cookbook::class, 'cookbook_recipe');
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
