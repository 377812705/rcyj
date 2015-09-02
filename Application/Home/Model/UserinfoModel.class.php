<?php
namespace Home\Model;
use Think\Model;

/**
 * Class 永华模型
 * @package Home\Model
 */
class UserinfoModel extends Model{
    //添加注册信息到表
    public function update($data){
        /* 添加用户 */
        $uid = $this->add($data);
        if($uid){
            return $uid ? $uid : 0; //0-未知错误，大于0-注册成功
        } else {
            return false;
        }
    }

}
?>