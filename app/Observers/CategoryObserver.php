<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{

    /**
     * Handle the Category "deleting" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleting(Category $category)
    {
        $category->children->each(function($child){
            $child->parent_id = null;
            $child->save();
        });
    }

}
