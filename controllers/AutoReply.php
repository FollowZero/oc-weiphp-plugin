<?php namespace Plus\Weiphp\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class AutoReply extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Plus.Weiphp', 'weiphp', 'auto_reply');
    }

}
