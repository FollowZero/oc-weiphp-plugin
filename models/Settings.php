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

class Settings extends Model
{
    /**
     * @var array Behaviors implemented by this model.
     */
    public $implement = [
        \System\Behaviors\SettingsModel::class
    ];

    public $settingsCode = 'weiphp_settings';
    public $settingsFields = 'fields.yaml';

    const PUBLIC_TYPE_0 = '0';
    const PUBLIC_TYPE_1 = '1';
    const PUBLIC_TYPE_2 = '2';
    const PUBLIC_TYPE_3 = '3';

    const PUBLIC_TOKEN = 'weiphp';

    public function initSettingsData()
    {
        $this->public_type = self::PUBLIC_TYPE_0;
        $this->public_token = self::PUBLIC_TOKEN;
    }

    public function getPublicTypeOptions()
    {
        return [
            self::PUBLIC_TYPE_0 => [
                'plus.weiphp::lang.settings.public_type_0',
            ],
            self::PUBLIC_TYPE_1 => [
                'plus.weiphp::lang.settings.public_type_1',
            ],
            self::PUBLIC_TYPE_2 => [
                'plus.weiphp::lang.settings.public_type_2',
            ],
            self::PUBLIC_TYPE_3 => [
                'plus.weiphp::lang.settings.public_type_3',
            ]
        ];
    }

}