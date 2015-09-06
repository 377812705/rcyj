<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: ����� <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

class IndexController extends HomeController {

    public function index(){
    	
        session('PRI_URL', null);
        //推荐作品
        $data['custom_id']=array('ELT',"0");
        $data['activity_id']=array('ELT',"0");
        $worksModel =D('Works');
        $workList = $worksModel->field("works_comic.id,create_status,tags,title,works_comic.user_id,main_image_url,money,theme,user.header_img,user.nick_name")->join('left join user on works_comic.user_id = user.id')->order('istj desc,id desc')->limit(8)->where($data)->select();
        $this->assign('tjwork',$workList);
        $tags =C('tag');
        $source=C('source');
        $this->assign('source',$source);
        $this->assign('tags',$tags);
        //定制作品推荐
        $custom=D('Custom')->getTJCustom();
        $this->assign("dzwork",$custom);
        //作者推荐
        $author=D('Author')->getTjAuthor();
        $this->assign('author',$author);

        $this->display();
    }
    public function about(){
        $this->display();
    }
    public function standard(){
        $this->display();
    }
    public function mechanism(){
        $this->display();
    }
    public function feedback(){
        $this->display();
    }
}