<?php
namespace rohsyl\OmegaPlugin\Blog;

use Illuminate\Support\Facades\Artisan;
use rohsyl\OmegaCore\Utils\Common\Plugin\Form\PluginFormFactory;
use rohsyl\OmegaCore\Utils\Common\Plugin\Plugin as OmegaPlugin;
use rohsyl\OmegaCore\Utils\Common\Plugin\Type\TextSimple\TextSimple;
use rohsyl\OmegaPlugin\Blog\Http\Controllers\Overt\PluginController;

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

        Artisan::call('omega-plugin-blog:install');
        Artisan::call('migrate');


        //$this->createForm();


        return true;
    }

    private function createForm() {

        $this->makeForm(function(PluginFormFactory $builder) {
            $builder->form('[title]', true, true);
			// ...
        });

    }

    function overtController(): string
    {
		return PluginController::class;
	}
}