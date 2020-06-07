<?php namespace Wollson\SeoGeneral\Components;

use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Wollson\SeoGeneral\Models\SeoGeneral;

class SeoGeneralCmp extends ComponentBase
{
    /**
     * @var RainLab\Blog\Models\Widgets The widgets model used for display.
     */
    public $seo;
    public $url;

    public function componentDetails()
    {
        return [
            'name'        => 'SeoGeneral',
        ];
    }

    public function onRun()
    {
        $this->seo = SeoGeneral::first();
        $this->url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }


}