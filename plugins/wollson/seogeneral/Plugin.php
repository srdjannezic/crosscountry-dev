<?php namespace Wollson\SeoGeneral;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Wollson\SeoGeneral\Components\SeoGeneralCmp' => 'SeoGeneral',
        ];
    }

    public function registerSettings()
    {
    }
}
