<?php
namespace Home\Model;
use Think\Model;

/**
 * Class 作品模型
 * @package Home\Model
 */
class AuthorModel extends Model{
    protected $trueTableName = 'user';

    /**
     * 得到用户信息
     * @param null $uid 用户ID
     * @return mixed
     */
    public  function getUserInfo($uid=null){
       return $this->where("id='{$uid}'")->select();
    }

    /**
     * 得到所有作者
     * @return mixed
     */
    public function getAllAuthor(){
        return $this->where("author_flag='1'")->limit(10)->select();
    }

    /**
     * 得到推荐作者
     * @return mixed
     */
    public function getTjAuthor(){
        return $this->where("author_flag='1'")->limit(8)->select();
    }
}
?>