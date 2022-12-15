<?php
namespace rohsyl\OmegaPlugin\Blog\Http\Controllers\Overt;

use rohsyl\OmegaCore\Utils\Common\Plugin\Controllers\OvertPluginController as Controller;

class PluginController extends Controller
{
    public function display($param, $data) {

        return view('omega-plugin-blog::overt.display');
    }
}