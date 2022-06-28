<?php
namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::with('subcategories')->get();

        $view->with('categories',  $categories);
    }
}
