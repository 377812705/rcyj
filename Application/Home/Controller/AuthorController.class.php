<?php

// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

use User\Api\UserApi;
use Think\Page;

class AuthorController extends HomeController {

    public function index() {
        //形象最低接单金额
        $uinfo[0]['minmoney']='300';

        $this->assign('uinfo',$uinfo[0]);

        $this->assign('uid',is_login());

        $address=I('address');
        if($address!='全部地区'){
            $data['address']=$address;
        }else{
            unset($data);
        }
        $od=I('order');
        switch ($od)
        {
            case '最新加入':
                $order='create_date desc,id desc';
                break;
            case '人气最高':
                $order='pop_count asc,id desc';
                break;
            case '粉丝最多':
                $order='fans_count asc,id desc';
                break;
            case '作品最多':
                $order='work_count desc,id desc';
                break;
            case '成交量最多':
                $order='create_date desc,id desc';
                break;
            case '诚信度最高':
                $order='create_date desc,id desc';
                break;
            default:
                $order='create_date desc,id desc';
        }

        //作者
        $acount=D('Author')->where($data)->count();
        $pageshowcount=8;
        $Page       = new Page($acount,$pageshowcount);
        $show   = $Page->pageshow();
        $author=D('Author')->order($order)->where($data)->limit($Page->firstRow.','.$Page->listRows)->select();
       // dump($show);
        $this->assign('author',$author);
        $this->assign('show',$show);
        $this->display();
    }
    public function details($id=null){
        $uinfo=D('Author')->getUserInfo($id);

        //作品标签
        $tags=D('Tags')->getTags();
        $this->assign('zttag',$tags);

        //作品
        $uwork=D('Works')->getUserWorks($id);
        //收藏作品
        $uswork=D('Works')->getUserSWorks($id);
        //形象最低接单金额
        $uinfo[0]['minmoney']='300';
        //作品
        $uinfo[0]['workcount']=count($uwork);
        //Ul最小高度
        $ulheight=ceil(count($uwork)/4)*387;
        $this->assign('ulheight',$ulheight);
        //成交量
        $uinfo[0]['customcount']='56';
        $this->assign('uwork',$uwork);
        $this->assign('uswork',$uswork);
        $this->assign('uinfo',$uinfo[0]);
        //作者
        $author=D('Author')->getAllAuthor();
        $this->assign('author',$author);


        $this->display();
    }
    public function pAuthorReg(){
        $isno=I('isno');

        $this->assign('isno',$isno);
        $this->display();
    }
    public function eAuthorReg(){
        $isno=I('isno');
        $this->assign('isno',$isno);
        $this->display();
    }
}
