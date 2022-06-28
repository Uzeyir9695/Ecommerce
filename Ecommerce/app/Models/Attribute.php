<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['subcategory_id', 'name', 'value'];

//    protected $casts = ['value' => 'array'];
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
