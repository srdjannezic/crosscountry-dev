<?php namespace Cc\Ccsupport\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class CcSupportController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Cc.Ccsupport', 'main-menu-item');
    }
}
