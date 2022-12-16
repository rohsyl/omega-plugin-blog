<?php
namespace rohsyl\OmegaPlugin\Blog;

use rohsyl\OmegaCore\Utils\Common\Facades\Plugin as PluginManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use rohsyl\OmegaCore\Utils\Common\Facades\Hook;

class ServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('omega-plugin-blog')
            ->hasConfigFile('omega-plugin-blog')
            ->hasViews('omega-plugin-blog')
            ->hasRoute('web')
            ->hasMigrations([
                '001_create_blog_categories_table',
                '002_create_blog_posts_table',
                '003_create_blog_comments_table',
                '004_create_blog_category_blog_post_table',
            ])
            ->runsMigrations(true)
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile();
            })
            ;
    }

    public function packageBooted()
    {
        PluginManager::register(new Plugin());

        Hook::addAction('admin_menu_item', function($menuItem, $position) {
            if(isset($menuItem['name']) && $menuItem['name'] == 'pages-index' && $position == 'after') {
                return view('omega::admin.partials.menu-item', [
                    'icon' => 'fa fa-blog',
                    'label' => 'Blog',
                    'route' => route('omega-plugin-blog.index')
                ]);
            }
        });
    }
}