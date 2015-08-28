<?php
namespace Home\Model;
use Think\Model;

/**
 * Class 作品模型
 * @package Home\Model
 */
class WorksModel extends Model{
    protected $trueTableName = 'works_comic';
    /**
     * 得到用户的所有作品
     * @param string $uid 用户id
     * @return mixed
     */
    public function getUserWorks($uid=null){
        $data= $this->where("user_id='{$uid}'")->limit(24)->select();
        return $data;
    }

    /**
     * 得到用户的所有作品
     * @param string $uid 用户id
     * @return mixed
     */
    public function getUserSWorks($uid=null){
        $data= $this->where("user_id='{$uid}'")->limit(16)->select();
        return $data;
    }

    /**
     * 得到所有作品
     * @return mixed
     */
    public function getAllWorks(){
        return $this->limit(24)->select();
    }

    /**
     * 得到推荐作品
     * @return mixed
     */
    public function getTJWoks(){
        return $this->where("istj='1'")->limit(8)->select();
    }

    public function getOrderWorkByid($id){
    	return $this->find($id);
    }

    public function getWorksByUserId($userid,$limit=3){
    	return $this->field('main_image_url,assistant_image_url,id')->where("user_id=".$userid." and title is not Null")->limit($limit)->select();
    }
}
?>