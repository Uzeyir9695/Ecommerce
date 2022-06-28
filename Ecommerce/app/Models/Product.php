<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['user_id', 'subcategory_id', 'name', 'price', 'quantity', 'description', 'discount'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class)->withTimestamps();
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
