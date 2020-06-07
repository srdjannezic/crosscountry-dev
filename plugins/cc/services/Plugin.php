<?php namespace Cc\Services;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return ['Cc\Services\Components\ServicesCmp' => 'ServicesList',
    			'Cc\Services\Components\ServiceSingle' => 'ServiceSingle'];
    }

    public function registerSettings()
    {
    }
}
