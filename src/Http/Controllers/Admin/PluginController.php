<?php
namespace rohsyl\OmegaPlugin\Blog\Http\Controllers\Admin;

use rohsyl\OmegaCore\Utils\Common\Plugin\Controllers\AdminPluginController as Controller;

class PluginController extends Controller
{
    public function index() {
        return view('omega-plugin-blog::admin.index');
    }

}