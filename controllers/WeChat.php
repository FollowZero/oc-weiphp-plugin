<?php namespace Plus\Weiphp\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

use EasyWeChat\Kernel\Messages\Text;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
use EasyWeChat\Kernel\Messages\Image;
use EasyWeChat\Kernel\Messages\Voice;
use EasyWeChat\Kernel\Messages\Video;

use Log;
use EasyWeChat\Factory;
use Plus\Weiphp\Models\Settings;
use Plus\Weiphp\Models\WecomeSettings;
use Config;

use Plus\Weiphp\Models\AutoReply;
use Plus\Weiphp\Models\MaterialText;
use Plus\Weiphp\Models\MaterialNews;
use Plus\Weiphp\Models\MaterialImage;
use Plus\Weiphp\Models\MaterialFile;


class WeChat extends Controller
{
    public $implement = [    ];
    
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $settings = Settings::instance();
        $config = Config::get('wechat');//用此获取配置文件的配置
        $config['official_account']['default'] = [
            'app_id'=>$settings->appid,
            'secret'=>$settings->secret,
            'token'=>$settings->public_token,
            'aes_key'=>$settings->encodingaeskey,
        ];
        $app = Factory::officialAccount($config);
        $app->server->push(function($message){
            // $message['FromUserName'] // 用户的 openid
            // $message['MsgType'] // 消息类型：event, text....
            Log::info($message);

            switch ($message['MsgType']) {
                case 'event':
                    if($message['Event']=='subscribe'){//关注事件
                        $reg=$this->wecome();
                    }
//                    return '收到事件消息';
                    break;
                case 'text':
                    //判断自定义回复
                    $reg=$this->auto_reply($message);
//                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
            if($reg['msg_type']=='text'){
                $text = new Text($reg['material']['content']);
                return $text;
            }elseif($reg['msg_type']=='news'){
                $items = [
                    new NewsItem([
                        'title'       => $reg['material']['title'],
                        'description' => $reg['material']['intro'],
                        'url'         => $reg['material']['url'],
                        'image'       => $reg['material']['cover']['path'],
                    ]),
                ];
                $news = new News($items);
                return $news;
            }elseif($reg['msg_type']=='img') {
                $image = new Image($reg['material']['media_id']);
                return $image;
            }elseif($reg['msg_type']=='voice') {
                $voice = new Voice($reg['material']['media_id']);
                return $voice;
            }elseif($reg['msg_type']=='video') {
                $video = new Video($reg['material']['media_id'], [
                    'title' => $reg['material']['title'],
                    'description' => $reg['material']['introduction'],
                ]);
                return $video;
            }

        });

        $response = $app->server->serve();
        return $response;
    }

    /**
     * 欢迎语回复
     */
    public function wecome(){
        $wecome_settings = WecomeSettings::instance();
        $we_info['msg_type']=$wecome_settings->msg_type;
        if($wecome_settings->msg_type=='text'){
            $mt_info=MaterialText::where('id',$wecome_settings->text_id)->first();
            $we_info['material']=$mt_info;
        }elseif ($wecome_settings->msg_type=='news'){
            $mn_info=MaterialNews::where('id',$wecome_settings->news_id)->first();
            $we_info['material']=$mn_info;
        }elseif ($wecome_settings->msg_type=='img'){
            $mi_info=MaterialImage::where('id',$wecome_settings->img_id)->first();
            $we_info['material']=$mi_info;
        }elseif ($wecome_settings->msg_type=='voice'){
            $mvo_info=MaterialFile::where('id',$wecome_settings->voice_id)->first();
            $we_info['material']=$mvo_info;
        }elseif ($wecome_settings->msg_type=='video'){
            $mvi_info=MaterialFile::where('id',$wecome_settings->video_id)->first();
            $we_info['material']=$mvi_info;
        }
        return $we_info;
    }
    /**
     * 自定义回复
     * @param $message
     * @return mixed
     */
    public function auto_reply($message){
        $ar_info= AutoReply::where('keyword',$message['Content'])->first();
        if($ar_info->msg_type=='text'){
            $mt_info=MaterialText::where('id',$ar_info->text_id)->first();
            $ar_info['material']=$mt_info;
        }elseif ($ar_info->msg_type=='news'){
            $mn_info=MaterialNews::where('id',$ar_info->news_id)->first();
            $ar_info['material']=$mn_info;
        }elseif ($ar_info->msg_type=='img'){
            $mi_info=MaterialImage::where('id',$ar_info->img_id)->first();
            $ar_info['material']=$mi_info;
        }elseif ($ar_info->msg_type=='voice'){
            $mvo_info=MaterialFile::where('id',$ar_info->voice_id)->first();
            $ar_info['material']=$mvo_info;
        }elseif ($ar_info->msg_type=='video'){
            $mvi_info=MaterialFile::where('id',$ar_info->video_id)->first();
            $ar_info['material']=$mvi_info;
        }
        return $ar_info;
    }


}
