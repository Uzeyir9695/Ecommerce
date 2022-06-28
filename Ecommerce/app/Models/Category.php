<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function attributes()
    {
        return $this->hasManyThrough(Attribute::class, Subcategory::class);
    }

}
