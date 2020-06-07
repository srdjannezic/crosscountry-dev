<?php namespace Cc\Blocks\Components;

use BackendAuth;
use Db;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Blocks\Models\BlocksModel;

class BlocksCmp extends ComponentBase
{
    /**
     * @var Collection A collection of categories to display
     */
    public $blocks;

    public function componentDetails()
    {
        return [
            'name'        => 'blocks',
        ];
    }

    public function defineProperties()
    {
        return [
            'region' => [
                'title'       => 'Block ID',
                'type'        => 'string'
            ],
        ];
    }

    public function onRun()
    {
        $this->blocks = $this->page['blocks'] = BlocksModel::where('id',$this->property('region'))->first();
    }
}
