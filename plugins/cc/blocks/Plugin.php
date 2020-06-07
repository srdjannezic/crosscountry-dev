<?php namespace Cc\Blocks;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return ['Cc\Blocks\Components\BlocksCmp' => 'Blocks'];
    }

    public function registerSettings()
    {
    }
}
