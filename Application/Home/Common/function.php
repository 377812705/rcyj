<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 前台公共库文件
 * 主要定义前台公共函数库
 */

/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function check_verify($code, $id = ''){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

/**
 * 获取列表总行数
 * @param  string  $category 分类ID
 * @param  integer $status   数据状态
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_list_count($category, $status = 1){
    static $count;
    if(!isset($count[$category])){
        $count[$category] = D('Document')->listCount($category, $status);
    }
    return $count[$category];
}

/**
 * 获取段落总数
 * @param  string $id 文档ID
 * @return integer    段落总数
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_part_count($id){
    static $count;
    if(!isset($count[$id])){
        $count[$id] = D('Document')->partCount($id);
    }
    return $count[$id];
}

/**
 * 获取导航URL
 * @param  string $url 导航URL
 * @return string      解析或的url
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_nav_url($url){
    switch ($url) {
        case 'http://' === substr($url, 0, 7):
        case '#' === substr($url, 0, 1):
            break;        
        default:
            $url = U($url);
            break;
    }
    return $url;
}

/**
 * 得到用户头像
 * @param null $uid
 * @return mixed
 */
function getUserImg($uid=null){
    $data=D('Author')->getUserInfo($uid);
    return $data[0]['header_img'];
}

/**
 * 得到用户名称
 * @param null $uid
 * @return mixed
 */
function getUserName($uid=null){
    $data=D('Author')->getUserInfo($uid);
    return $data[0]['nick_name'];
}

function getUserCustomType($uid=null){
   $data= D('Userinfo')->field('isme')->where("userid='{$uid}'")->select();
    return empty($data[0]['isme'])?'0':$data[0]['isme'];
}

/**
 * @return string
 * 生成6位邀请码
 */
function make_coupon_card() {
    $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $rand = $code[rand(0,25)]
        .strtoupper(dechex(date('m')))
        .date('d').substr(time(),-5)
        .substr(microtime(),2,5)
        .sprintf('%02d',rand(0,99));
    for(
        $a = md5( $rand, true ),
        $s = '0123456789ABCDEFGHIJKLMNOPQRSTUV',
        $d = '',
        $f = 0;
        $f < 8;
        $g = ord( $a[ $f ] ),
        $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
        $f++
    );
    return $d;
}

function getUserThreeWork($uid=null){
    $data=D('Works')->getWorksByUserId($uid);
    $html="";
    $errorimg="this.src='__IMG__/works.png'";
    foreach($data as $d){
       $html= $html. "<img src='{$d['main_image_url']}' style='height: 110px;'/>";
    }

    return $html;
}
function getUserWorkcount($uid=null){
    $data=D('Works')->where("user_id={$uid}")->count();
    return $data;
}
function getUserCustomcount($uid=null){
    $data=D('Custom')->where("touid={$uid}")->count();
    return $data;
}

/**
* 检测手机号是否符合要求
* @param
* @date: 2015年8月31日 下午4:02:09
* @author: yql
* @version: 3.0.0
*/
/**
 *	验证手机号
 * @param $mobile 手机号
 **/
function checkMobile($mobile) {
    return preg_match("/^(?:13\d|14\d|15\d|17\d|18[0123456789])-?\d{5}(\d{3}|\*{3})$/", $mobile);
}