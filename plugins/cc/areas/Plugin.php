<?php namespace Cc\Areas;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return 
    	[
    		'Cc\Areas\Components\AreasCmp' => 'AreasList',
    		'Cc\Areas\Components\AreaSingleCmp' => 'AreaSingle'
    	];
    }

    public function registerSettings()
    {
    }
}
