<?php namespace Cc\Services\Components;

use BackendAuth;
use Db;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Services\Models\Services;

class ServiceSingle extends ComponentBase
{
    /**
     * @var Collection A collection of categories to display
     */
    public $service;

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'slug',
                'description' => 'slug',
                'type'        => 'string',
                'default'     => '{{ :slug }}',
            ],
        ];
    }

    public function componentDetails()
    {
        return [
            'name'        => 'service single',
        ];
    }

    public function onRun()
    {
        //var_dump($this->property('slug'));
        $this->page['service'] = $this->service = Services::where('slug',$this->property('slug'))->first();
    }
}
