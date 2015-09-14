<?php
namespace Home\Model;

use Think\Model;

/**
 * Class 订制模型
 * @package Home\Model
 */
class CustomModel extends Model
{
    public function getAllWorks()
    {
        return $this->select();
    }
    public function getOrderCustomByid($id)
    {
        return $this->find($id);
    }

    public function getTJCustom()
    {
        return $this->where('cusstatus>1')->order('createtime desc')->limit(8)->select();
    }
}

?>