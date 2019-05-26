<?php namespace Plus\Weiphp;

use System\Classes\PluginBase;
use Backend;
class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerNavigation()
    {
        return [
            'weiphp' => [
                'label' => 'plus.weiphp::lang.plugin.name',
                'url' => Backend::url('plus/weiphp/materialtext'),
                'icon' => 'icon-wechat',
                'iconSvg'     => 'plugins/plus/weiphp/assets/images/wplogo.svg',
                'permissions' => [''],
                'order' => 500,
                'sideMenu' => [
                    'wecome' => [
                        'label'       => 'plus.weiphp::lang.wecome.menu_label',
                        'icon'        => 'icon-pagelines',
                        'url'         => Backend::url('system/settings/update/plus/weiphp/wecome'),
                        'permissions' => [''],
                    ],
//                    'custom_menu' => [
//                        'label'       => 'plus.weiphp::lang.custom_menu.menu_label',
//                        'icon'        => 'icon-columns',
//                        'url'         => Backend::url(''),
//                        'permissions' => ['']
//                    ],
                    'auto_reply' => [
                        'label'       => 'plus.weiphp::lang.auto_reply.menu_label',
                        'icon'        => 'icon-bullhorn',
                        'url'         => Backend::url('plus/weiphp/autoreply'),
                        'permissions' => ['']
                    ],
                    'material' => [
                        'label'       => 'plus.weiphp::lang.material.menu_label',
                        'icon'        => 'icon-film',
                        'url'         => Backend::url('plus/weiphp/materialtext'),
                        'permissions' => ['']
                    ]
                ]
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'plus.weiphp::lang.settings.menu_label',
                'description' => 'plus.weiphp::lang.settings.menu_description',
                'category'    => 'plus.weiphp::lang.plugin.name',
                'icon'        => 'icon-cog',
                'class'       => 'plus\Weiphp\Models\Settings',
                'order'       => 500,
                'permissions' => ['']
            ],
            'wecome'=>[
                'label'       => '欢迎语设置',
                'description' => '欢迎语设置',
                'category'    => 'plus.weiphp::lang.plugin.name',
                'icon'        => 'icon-pagelines',
                'class'       => 'plus\Weiphp\Models\WecomeSettings',
                'order'       => 600,
                'permissions' => ['']
            ]
        ];
    }
}
