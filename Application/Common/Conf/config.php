<?php

defined('THINK_PATH') or exit();
return array(
    /* 其他设置 */
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'thinktms', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'root', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'thinktms_', // 数据库表前缀

    /* 支付设置 */
    'payment' => array(
        'tenpay' => array(
            // 加密key，开通财付通账户后给予
            'key' => 'e82573dc7e6136ba414f2e2affbe39fa',
            // 合作者ID，财付通有该配置，开通财付通账户后给予
            'partner' => '1900000113'
        ),
        'alipay' => array(
            // 收款账号邮箱
            'email' => '',
            // 加密key，开通支付宝账户后给予
            'key' => '',
            // 合作者ID，支付宝有该配置，开通易宝账户后给予
            'partner' => ''
        ),
        'palpay' => array(
            'business' => 'zyj@qq.com'
        )
    )
);