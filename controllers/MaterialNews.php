<?php namespace Plus\Weiphp\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Db;

class MaterialNews extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Plus.Weiphp', 'weiphp', 'material');
    }

    public function index()
    {
        $this->addCss('/plugins/plus/weiphp/assets/css/weiphp.css');
        $this->asExtension('ListController')->index();
    }
//    public function listExtendQuery($query)
//    {
//        $query->select(Db::raw('min(id) as id'),'group_id')->where('is_use',1)->groupBy('group_id');
//    }



}
