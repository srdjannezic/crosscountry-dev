<?php namespace Cc\Estimate;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return ['Cc\Estimate\Components\EstimateCmp' => 'EstimateForm'];
    }

    public function registerSettings()
    {
    }
}
