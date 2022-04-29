<?php

defined('THINK_PATH') or exit();
return array(
    /* 其他设置 */


    /* 支付设置 */
    'payment' => array(
        'tenpay' => array(
            // 加密key，开通财付通账户后给予
            'key' => '',
            // 合作者ID，财付通有该配置，开通财付通账户后给予
            'partner' => ''
        ),
        'alipay' => array(
            // 收款账号邮箱
            'email' => '',
            // 加密key，开通支付宝账户后给予
            'key' => '',
            // 合作者ID，支付宝有该配置，开通易宝账户后给予
            'partner' => ''
        )
    )
);
