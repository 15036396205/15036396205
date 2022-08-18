@@ -1,31 +1,39 @@
<?php
defined('THINK_PATH') or exit();
return array(
    /* 其他设置 */
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => 'pay', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'root', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'think_', // 数据库表前缀
    /* 支付设置 */
    'payment' => array(
        'tenpay' => array(
            // 加密key，开通财付通账户后给予
            'key' => 'e82573dc7e6136ba414f2e2affbe39fa',
            // 合作者ID，财付通有该配置，开通财付通账户后给予
            'partner' => '1900000113'
        ),
        '支付宝' =>数组(
            // 收款账户邮箱
            '电子邮件' => '' ,
            'email' => ' chenf003@yahoo.cn ' ,
            // 加密密钥，支付宝账户后提供
            '键' => '' ,
            'key' => ' aaa ' ,
            // 合作者，支付宝有配置开通，易宝账户后提供
            '合作伙伴' => ''
            '合作伙伴' => '2088101000137799'
        ),
        'aliwappay' =>数组(
            // 收款账户邮箱
            'email' => 'chenf003@yahoo.cn' ,
            // 加密密钥，支付宝账户后提供
            'key' => 'aaa' ,
            // 合作者，支付宝有配置开通，易宝账户后提供
            '合作伙伴' => '2088101000137799'
        ),
        'palpay' =>数组(
            '企业' => 'zyj@qq.com'
        ),
        'yeepay' => array(
            'key' => '69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl',
            'partner' => '10001126856'
        ),
        'kuaiqian' => array(
            'key' => '1234567897654321',
            'partner' => '1000300079901'
        ),
        'unionpay' => array(
            'key' => '88888888',
            'partner' => '105550149170027'
        )
    )
);
  3 
应用程序/主页/视图/索引/index.html
@@ -7,13 +7,14 @@
    </头>
    <身体>
        < div >
            < form  action ="" method =" post " target =" _blank " > 
            <表单 动作=""方法="发布" >
                < label > < input  type =" radio " name =" paytype " value ="支付宝" />支付宝</ label >
                < label > < input  type =" radio " name =" paytype " value =" tenpay "/>财通</ label >
                < label > < input  type =" radio " name =" paytype " value =" palpay "/>贝宝</ label >
                < label > < input  type =" radio " name =" paytype " value =" yeepay "/>易付宝</ label >
                < label > < input  type =" radio " name =" paytype " value =" kuaiqian "/>快钱</ label >
                < label > < input  type =" radio " name =" paytype " value = " unionpay "/>银联</ label >
                 < label > < input  type =" radio " name =" paytype " value =" aliwappay " />支付宝wap </ label >
                <输入 类型=“文本”名称=“钱”值=“ 200 ”/>
                <输入 类型="提交"值="提交"/>
            </表格>
  13 
ThinkPHP/图书馆/Think/Pay/Driver/Aliwappay.class.php
@@ -45,7 +45,7 @@ 公共函数 buildRequestForm(PayVo $vo) {
        $参数    =数组(
            "服务" => " alipay.wap.trade.create.direct ",
            “合作伙伴”=> $这个->配置[ '合作伙伴' ]，
            " sec_id " => " md5 ",
            " sec_id " => " MD5 ",
            “格式”=>“ xml ”，
            " v " => " 2.0 ",
            “ req_id ” => $ req_id ,
@@ -55,8 +55,13 @@ public function buildRequestForm(PayVo $vo) {

        $ param [ 'sign' ] = $ this -> createSign ( $ param );

        $ return_html    = $ this -> fsockOpen ( $ this -> gateway , "", $ param );
        $ return_data    = $ this -> parseResponse (urldecode( $ return_html ));
        $ return_html = $ this -> fsockOpen ( $ this -> gateway , "", $ param );
        $ return_data = $ this -> parseResponse (urldecode( $ return_html ));
        如果（isset（$ return_data [ 'res_error' ]））{
            $ doc = new \ DOMDocument ();
            $ doc -> loadXML ( $ return_data [ 'res_error' ]);
            E ( '[(' . $ doc -> getElementsByTagName ( 'code' )-> item ( 0 )-> nodeValue . ')' . $ doc -> getElementsByTagName ( 'msg' )-> item ( 0 )-> nodeValue . ']' . $ doc -> getElementsByTagName ( 'detail' )-> item ( 0 )-> nodeValue );
        }
        //获取request_token
        $ request_token = $ return_data [ 'request_token' ];
        //业务详细
@@ -65,7 +70,7 @@ 公共函数 buildRequestForm(PayVo $vo) {
        $参数         =数组(
            “服务”=>“支付宝.wap.auth.authAndExecute ”，
            “合作伙伴”=> $这个->配置[ '合作伙伴' ]，
            " sec_id " => " md5 ",
            " sec_id " => " MD5 ",
            “格式”=>“ xml ”，
            " v " => " 2.0 ",
            “ req_id ” => $ req_id ,
