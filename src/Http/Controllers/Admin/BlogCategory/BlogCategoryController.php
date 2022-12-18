<?php

namespace rohsyl\OmegaPlugin\Blog\Http\Controllers\Admin\BlogCategory;

use rohsyl\OmegaCore\Utils\Common\Plugin\Controllers\AdminPluginController as Controller;
use rohsyl\OmegaPlugin\Blog\Models\BlogCategory;

class BlogCategoryController  extends Controller
{

    public function index() {
        $categories = BlogCategory::all();
        return view('omega-plugin-blog::admin.blog-category.index', compact('categories'));
    }

    public function create() {

    }

    public function store($request) {

    }

    public function show(BlogCategory $category)
    {

    }

    public function edit(BlogCategory $category)
    {

    }

    public function update($request, BlogCategory $category)
    {

    }

    public function destroy(BlogCategory $category)
    {

    }
}