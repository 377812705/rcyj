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

class AuthorController extends HomeController {

    public function index() {

        //形象最低接单金额
        $uinfo[0]['minmoney']='300';
        //作品
        $uinfo[0]['workcount']='26';
        //成交量
        $uinfo[0]['customcount']='56';
        $this->assign('uinfo',$uinfo[0]);
        //作品标签
        $tags=D('Tags')->getTags();
        $this->assign('zttag',$tags);

        //作者
        $author=D('Author')->getAllAuthor();
        $this->assign('author',$author);

        $this->display();
    }
    public function details($id=null){
        if(empty($id)){
            $id='1799';
        }
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
        $this->display();
    }
    public function eAuthorReg(){
        $this->display();
    }
}
