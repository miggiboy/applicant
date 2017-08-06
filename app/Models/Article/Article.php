<?php

namespace App\Models\Article;

use App\Models\Model;

class Article extends Model
{
    /**
     * Includes only articles which title
     * is like given query parameter
     *
     * @param  $query
     * @param  string $input
     * @return \Illuminate\Support\Collection
     */
    public function scopeLike($query, $input)
    {
        return $query->where('title', 'like', "%{$input}%");
    }

    /**
     * Includes articles that belong to the given category
     *
     * @param  $query
     * @param  integer $category
     * @return \Illuminate\Support\Collection
     */
    public function scopeInCategory($query, $category)
    {
        return
            $query->whereHas('categories', function ($query) use ($category) {
                $query->where('id', $category);
            });
    }

    /**
     * Relations
     */

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class, 'article_category', 'article_id', 'category_id');
    }
}
