<?php
namespace Vendor\sms;
include_once("./REST.class.php");

class SendSMS {

    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
     */
    function sendTemplateSMS($to, $datas, $tempId) {
        // 初始化REST SDK
        //global $accountSid, $accountToken, $appId, $serverIP, $serverPort, $softVersion;
        //主帐号,对应开官网发者主账号下的 ACCOUNT SID
        $accountSid = '8a48b5514a51d087014a56d235c4034a';

        //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        $accountToken = '2922e8361b734b64a6a917c110755f4b';

        //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
        //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        $appId = '8a48b5514a61a814014a7a16517e0ea0';

        //请求地址
        //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
        //生产环境（用户应用上线使用）：app.cloopen.com
        $serverIP = 'app.cloopen.com';


        //请求端口，生产环境和沙盒环境一致
        $serverPort = '8883';

        //REST版本号，在官网文档REST介绍中获得。
        $softVersion = '2013-12-26';
        $rest = new REST($serverIP, $serverPort, $softVersion);
        $rest->setAccount($accountSid, $accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
        //echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to, $datas, $tempId);
        return $result;
    }

}
