<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;
use User\Api\UserApi;

/**
 * 文档基础模型
 */
class UserModel extends Model{
    protected $trueTableName = 'user';

   /**
   * 添加注册信息到数据库
   * @param
   * @date: 2015年8月31日 下午3:56:47
   * @author: yql
   * @version: 3.0.0
   */
	public function register($data){

	    /* 添加用户 */
	    if($data['id']){//更新
	        $rs = $this->where(array('id'=>$data['id']))->save($data);
	        if($rs){
	            $uid = $data['id'];
	        }
	    }else{
	        $uid = $this->add($data);
	    }
	    
	    if($uid){
	        return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
	    }else{
	        return false ;
	    }
	}

}
