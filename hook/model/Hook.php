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

}