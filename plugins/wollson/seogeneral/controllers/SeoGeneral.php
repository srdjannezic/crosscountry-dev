<?php namespace Wollson\SeoGeneral\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class SeoGeneral extends Controller
{
    public $implement = [        'Backend\Behaviors\FormController'    ];
    
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Wollson.SeoGeneral', 'main-menu-item');
    }
}
