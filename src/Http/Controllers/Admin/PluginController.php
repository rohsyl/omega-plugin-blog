<?php
namespace rohsyl\OmegaPlugin\Blog\Http\Controllers\Admin;

use rohsyl\OmegaCore\Utils\Common\Plugin\Controllers\AdminPluginController as Controller;
use rohsyl\OmegaPlugin\Blog\Extensions\Filters\Admin\BlogPost\BlogPostAdvancedQueryFilter;
use rohsyl\OmegaPlugin\Blog\Models\BlogPost;

class PluginController extends Controller
{
    public function index()
    {
        $posts = (new BlogPostAdvancedQueryFilter())->filter();
        return view('omega-plugin-blog::admin.index', compact('posts'));
    }
}