<?php
namespace Home\Model;
use Think\Model;

/**
 * Class 永华模型
 * @package Home\Model
 */
class CustomModel extends Model{
    public function getAllWorks(){
      return  $this->select();
    }

}
?>