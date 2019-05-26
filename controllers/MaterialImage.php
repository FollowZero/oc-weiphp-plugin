<?php namespace Plus\Weiphp\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

use EasyWeChat\Factory;
use October\Rain\Support\Facades\Flash;
use Plus\Weiphp\Models\Settings;
use Config;

class MaterialImage extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',   ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Plus.Weiphp', 'weiphp', 'material');
    }
    public function onSycImageToWechat(){
        $settings = Settings::instance();
        $config['app_id']=$settings->appid;
        $config['secret']=$settings->secret;
        $app = Factory::officialAccount($config);

        $list=\Plus\Weiphp\Models\MaterialImage::where('media_id','')->get();
        if(count($list)==0){
            Flash::success('上传素材完成');
        }
        foreach ($list as $vo) {
            $result = $app->material->uploadImage(preg_replace("/(.*)storage/",storage_path(),$vo->cover->path));
            if($result['media_id']){
                \Plus\Weiphp\Models\MaterialImage::where('id',$vo->id)->update(['media_id'=>$result['media_id']]);
            }
        }
        Flash::success('上传本地素材到微信中，请勿关闭');
    }
    public function onSycImageFromWechat(){

    }
}
