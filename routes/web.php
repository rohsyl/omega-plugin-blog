<?php


use Illuminate\Support\Facades\Route;

use rohsyl\OmegaPlugin\Blog\Http\Controllers\Admin\PluginController;

Route::prefix('admin/plugins/blog')->middleware(['web'])->group(function() {

    Route::get('/', [PluginController::class, 'index'])->name('omega-plugin-blog.index');

    Route::resource('posts', \rohsyl\OmegaPlugin\Blog\Http\Controllers\Admin\BlogPost\BlogPostController::class, ['as' => 'omega-plugin-blog'])->except('index');

});