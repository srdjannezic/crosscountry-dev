<?php namespace Cc\Areas\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Cc\Areas\Models\AreasModel;

class AreasController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Cc.Areas', 'main-menu-item');
    }

    public function onDuplicate() {
           $checked_items_ids = input('checked');

           foreach ($checked_items_ids as $id) {
              $original = AreasModel::where("id", $id)->first();

              $clone = $original->replicate();
              $clone->name = "Duplicate of ".$clone->name;
              $clone->slug = now()->timestamp."_".$clone->slug;
              //$clone->published = 1;
              //$clone->highlight = 0;
                
              $clone->id = AreasModel::max('id') + 1;
              $clone->save();
           }

           \Flash::success('Event cloned');
           return $this->listRefresh();
    }  
}
