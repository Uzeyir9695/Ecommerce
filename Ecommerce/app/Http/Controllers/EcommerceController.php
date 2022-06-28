<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcommerceController extends Controller
{
    public function index()
    {
        return view('layouts.master'); // This view automatically gets and renders products from View Composer. path: Ecommerce/app/Views/Composers::class
    }

    public function getAttributes(Subcategory $subcategory)
    {
        if(route('subcategories.index', [$subcategory->id, $subcategory->slug]) !== \request()->url()) {
            return view('error.404');
        }

        $products = Product::where('subcategory_id', $subcategory->id)->paginate(21);
        $attributes = $subcategory->attributes()->get()->groupBy(function($data) {
            return $data->name;
        });

        return view('ecommerce.index', compact( 'attributes', 'products'));
    }

}
