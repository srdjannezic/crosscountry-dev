<?php namespace Cc\Ccsupport;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    		'Cc\Ccsupport\Components\CcSupportCmp' => 'Support'];
    }

    public function registerSettings()
    {
    }
}
