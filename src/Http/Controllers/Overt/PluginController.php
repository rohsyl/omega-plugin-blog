<?php
namespace rohsyl\OmegaPlugin\Blog\Http\Controllers\Overt;

use rohsyl\OmegaCore\Utils\Overt\Facades\Entity;
use rohsyl\OmegaCore\Utils\Common\Plugin\Controllers\OvertPluginController as Controller;
use rohsyl\OmegaPlugin\Blog\Models\BlogPost;

class PluginController extends Controller
{

    public function display($param, $data)
    {
        if(request()->has('post')) {
            return $this->displayItem($param, $data);
        }
        else {
            return $this->displayList($param, $data);
        }
    }

    private function displayList($param, $data)
    {
        $category_ids = array_map(fn($x) => $x['value'], $data['categories']);
        $posts = BlogPost::query()
            ->published()
            ->whereHas('blog_categories', function($query) use ($category_ids) {
                $query->whereIn('blog_categories.id', $category_ids);
            })
            ->with('featured_media')
            ->get();
        $data['posts'] = $posts;
        return $this->view('omega-plugin-blog::overt.display', $data);
    }

    private function displayItem($param, $data)
    {
        $post = BlogPost::query()
            ->published()
            ->where('slug', request()->post)
            ->with('featured_media')
            ->first();
        $data['post'] = $post;

        return $this->view('omega-plugin-blog::overt.display-item', $data);
    }
}