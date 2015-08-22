<?php
namespace Home\Model;
use Think\Model;

/**
 * Class 标签模型
 * @package Home\Model
 */
class TagsModel extends Model{
    /**
     * 得到作品标签
     * @return mixed
     */
    public function getTags(){
       return $this->where("tag_type='0'")->select();
    }

    /**
     * 得到作品主题
     * @return mixed
     */
    public function getWorksZT(){
        return $this->where("tag_type='2'")->select();
    }
}
?>