<?php
namespace rohsyl\OmegaPlugin\Blog;

use Illuminate\Support\Facades\Artisan;
use rohsyl\OmegaCore\Utils\Common\Plugin\Form\PluginFormFactory;
use rohsyl\OmegaCore\Utils\Common\Plugin\Plugin as OmegaPlugin;
use rohsyl\OmegaCore\Utils\Common\Plugin\Type\TextSimple\TextSimple;
use rohsyl\OmegaPlugin\Blog\Http\Controllers\Overt\PluginController;
use rohsyl\OmegaCore\Utils\Common\Plugin\Type\DropDown\DropDown;
use rohsyl\OmegaPlugin\Blog\Plugin\Type\DropDown\Models\BlogCategoryDropDownModel;
use rohsyl\OmegaPlugin\Bundle\Plugins\DividedContent\DataModel\DropDownPageDataModel;

class Plugin extends OmegaPlugin
{
    const NAME = 'blog';

    /**
     * Here name your plugin
     * @return string
     */
    public function name() : string {
        return self::NAME;
    }

    public function install() : bool {

        if(!$this->isInstalled()) {
            Artisan::call('migrate', ['--force' => true]);
            Artisan::call('omega-plugin-blog:install');
        }

        $this->createForm();

        return true;
    }

    private function createForm() {

        $this->makeForm(function(PluginFormFactory $builder) {
            $builder->form('Blog list', true, true);
            $builder->entry('categories', DropDown::class, ['model' => BlogCategoryDropDownModel::class, 'multiple' => true], 'Categories', 'You can choose from which categories to take blog posts. You can leave empty to get posts from all categories.', 1, false);
        });

    }

    function overtController(): string
    {
		return PluginController::class;
	}

    function adminIndex(): string {
        return route('omega-plugin-blog.index');
    }
}