<?php

namespace rohsyl\OmegaPlugin\Blog\Http\Controllers\Admin\BlogPost;

use Illuminate\Support\Str;
use rohsyl\OmegaCore\Models\User;
use rohsyl\OmegaCore\Utils\Common\Plugin\Controllers\AdminPluginController as Controller;
use rohsyl\OmegaPlugin\Blog\Http\Requests\Admin\BlogPost\CreateBlogPostRequest;
use rohsyl\OmegaPlugin\Blog\Http\Requests\Admin\BlogPost\UpdateBlogPostRequest;
use rohsyl\OmegaPlugin\Blog\Models\BlogCategory;
use rohsyl\OmegaPlugin\Blog\Models\BlogPost;
use rohsyl\OmegaPlugin\Blog\Plugin\Type\DropDown\Models\BlogCategoryDropDownModel;
use rohsyl\OmegaCore\Utils\Common\Facades\Plugin;
use rohsyl\OmegaCore\Utils\Common\Plugin\Type\MediaChooser\MediaChooser;

class BlogPostController extends Controller
{
    public function create()
    {
       return view('omega-plugin-blog::admin.blog-post.create');
    }

    public function store(CreateBlogPostRequest $request)
    {
        $inputs = $request->validated();

        BlogPost::create([
            'title' => $inputs['title'],
            'slug' => Str::slug($inputs['title']),
            'author_id' => auth()->id(),
            'author_type' => User::class,
            'published_at' => null,
        ]);

        return redirect()->route('omega-plugin-blog.index');
    }

    public function edit(BlogPost $post)
    {
        $categories = (new BlogCategoryDropDownModel(null))->getKeyValueArray();
        return view('omega-plugin-blog::admin.blog-post.edit', compact('post', 'categories'));
    }

    public function update(UpdateBlogPostRequest $request, BlogPost $post)
    {
        $inputs = $request->validated();
        $inputs['featured_media_id'] = Plugin::types()->getRequest(MediaChooser::class, ['featured_media_id']);

        $post->update($inputs);

        $post->blog_categories()->detach();
        $post->blog_categories()->attach($inputs['categories']);

        return redirect()->route('omega-plugin-blog.posts.edit', $post);
    }
}