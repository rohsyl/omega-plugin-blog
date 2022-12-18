<?php

namespace rohsyl\OmegaPlugin\Blog\Extensions\Filters\Admin\BlogPost;

use rohsyl\LaravelAdvancedQueryFilter\AdvancedQueryFilter;
use rohsyl\OmegaPlugin\Blog\Models\BlogPost;

class BlogPostAdvancedQueryFilter extends AdvancedQueryFilter
{
    public function __construct()
    {
        parent::__construct();
        $this->pagination = DEFAULT_PAGINATION;
    }

    public function query()
    {
        return BlogPost::query();
    }

    public function finalize($query)
    {
        return $query
            ->withCount('blog_comments')
            ->with(['featured_media']);
    }

    public function plain($query, $text) {
        return $query->whereLike([
            'slug',
            'title',
            'introduction',
            'description',
        ], $text);
    }
}