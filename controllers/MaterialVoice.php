<?php namespace Plus\Weiphp\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

use EasyWeChat\Factory;
use October\Rain\Support\Facades\Flash;
use Plus\Weiphp\Models\Settings;
use Config;

class MaterialVoice extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Plus.Weiphp', 'weiphp','material');
    }

    public function listExtendQuery($query)
    {
        $query->where('type', 1);
    }
    public function formBeforeSave($model){
        $model->type= 1;
    }
    public function onSycVoiceToWechat(){
        $settings = Settings::instance();
        $config['app_id']=$settings->appid;
        $config['secret']=$settings->secret;
        $app = Factory::officialAccount($config);

        $list=\Plus\Weiphp\Models\MaterialFile::where([['media_id','0'],['type',1]])->get();
        if(count($list)==0){
            Flash::success('上传素材完成');
        }
        foreach ($list as $vo) {
            $result = $app->material->uploadVoice(preg_replace("/(.*)storage/",storage_path(),$vo->file->path));
            if($result['media_id']){
                \Plus\Weiphp\Models\MaterialFile::where('id',$vo->id)->update(['media_id'=>$result['media_id']]);
            }
        }
        Flash::success('上传本地素材到微信中，请勿关闭');
    }
}
