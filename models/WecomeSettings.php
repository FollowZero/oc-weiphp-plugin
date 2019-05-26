<?php
/**
 * Created by PhpStorm.
 * User: 38577
 * Date: 2019/5/4
 * Time: 22:31
 */
namespace Plus\Weiphp\Models;

use Lang;
use Model;

class WecomeSettings extends Model
{
    /**
     * @var array Behaviors implemented by this model.
     */
    public $implement = [
        \System\Behaviors\SettingsModel::class
    ];

    public $settingsCode = 'weixin_wecome';
    public $settingsFields = '$/plus/weiphp/models/settings/fields_wecome.yaml';


}