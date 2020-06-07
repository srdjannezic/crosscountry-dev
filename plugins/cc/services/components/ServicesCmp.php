<?php namespace Cc\Services\Components;

use BackendAuth;
use Db;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Services\Models\Services;

class ServicesCmp extends ComponentBase
{
    /**
     * @var Collection A collection of categories to display
     */
    public $services;

    public function defineProperties()
    {
        return [
            'type' => [
                'title'       => 'type',
                'description' => 'type',
                'type'        => 'string',
                'default'     => '',
            ],
        ];
    }

    public function componentDetails()
    {
        return [
            'name'        => 'services',
        ];
    }

    public function onRun()
    {
        $this->page['services'] = Services::get();
        $this->page['type'] = $this->property('type');
    }
}
