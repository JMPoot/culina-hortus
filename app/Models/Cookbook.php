<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookbook extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function recipes() 
    {
        return $this->belongsToMany(Recipe::class, 'cookbook_recipe');
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
