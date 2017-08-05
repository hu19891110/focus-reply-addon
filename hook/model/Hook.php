<?php
namespace addons\focusreply\hook\model;


class Hook
{

    protected $sign = 'focusreply';

    /**
     * 订阅微信事件
     */
    public function wefeeProcessEvent($params)
    {
        if ($params->Event != 'subscribe') {
            return ;
        }

        /** 获取配置 */
        $config = get_addon_config($this->sign);

        if ($config && isset($config['reply_text'])) {
            return $config['reply_text'];
        }

        return ;
    }

    /**
     * 注册Wefee二级菜单
     * @return void
     */
    public function appBegin()
    {
        $menus = config('WEFEE_SECOND_MENUS');
        $menus = $menus?:[];
        $our = [
            [
                'title' => '关注回复',
                'href' => url('addons/addons/config', ['addons_sign' => 'FocusReply']),
            ]
        ];
        $menus = array_merge($menus, $our);
        config(['WEFEE_SECOND_MENUS' => $menus]);
    }

}