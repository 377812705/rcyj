<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common','User','Admin'),
    'MODULE_ALLOW_LIST'  => array('Home'),

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => 'N,t]!yP%-F3*l/"@`ADfgk<8iuz+nC#IV){a^(mX', //默认数据加密KEY

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //管理员用户ID

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 2, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '182.92.216.80', // 服务器地址
    'DB_NAME'   => 'v_2cy', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '2cydb',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => '2cy_', // 数据库表前缀

    /* 文档模型配置 (文档模型核心配置，请勿更改) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),
    'paystatus'=>array('1'=>'支付成功','0'=>'未支付'),
    'paytype'=>array('1'=>'微信','2'=>'块钱','3'=>'支付宝'),
    'category'=>array('2'=>'定制','1'=>'作品','3'=>'活动'),
    'goodstype'=>array('形象','漫画','插画（绘本）','产品设计','动画','游戏','音乐','VI','广告','课程'),
    'handle'=>array('1'=>'未返款','2'=>'已经返款'),
    
);
