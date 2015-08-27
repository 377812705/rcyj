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
class ProductController extends HomeController {

    public function index() {
        //作品标签
    	//dump(I('post.'));die;
        $source=C('source');
        $this->assign('source',$source);
        //作品
        $data['title']=array('exp',"is not Null");
        $create_status=I('post.create_status');
        if($create_status>0){
        	$data['create_status']=$create_status;
        	$dataf['create_status']=$create_status;
        }
        $tags=I('post.tags');
        if($tags>0){
        	$data['tags']=$tags;
        	$dataf['tags']=$tags;
        }
        $theme=I('post.theme');
        if($theme>0){
        	$data['theme']=$theme;
        	$dataf['theme']=$theme;
        }
        $news=I('post.news');
        $order='id desc';
        if($news>0){
        	if($news==1){
        		$order='money asc,id desc';
        	}else{
        		$order='money desc,id desc';
        	}
        	$dataf['news']=$news;
        }
        //$this->assign('dataf',$dataf);
        $worksModel =D('Works');
        $count      = $worksModel->where($data)->count();
        $pageshowcount=24;
        $Page       = new Page($count,$pageshowcount);
        $show       = $Page->pageshow();
        $workList = $worksModel->field("works_comic.id,create_status,title,works_comic.user_id,main_image_url,money,theme,user.header_img")->join('left join user on works_comic.user_id = user.id')->order($order)->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
        $this->assign('works',$workList);
        $this->assign('show',$show);
        $this->assign('wcount',$count);
        $tags=C('tag');
        $this->assign('tags',$tags);
        $theme=C('theme');
        $this->assign('theme',$theme);
        $this->display();
    }
    public function details(){
    	$id=I('get.id','');
    	$works=D('Works')->find($id);
    	$User=D('User')->find($works['user_id']);
    	$worklist=D('Works')->getWorksByUserId($works['user_id'],3);
    	$tags=C('tag');
        $this->assign('tags',$tags);
        $source=C('source');
        $this->assign('source',$source);
        $theme=C('theme');
        $this->assign('theme',$theme);
    	$this->assign('worklist',$worklist);
    	$this->assign('user',$User);
    	$this->assign('works',$works);
    	$show=C('show');
    	$this->assign('show',$show);
    	$use=C('use');
    	$this->assign('use',$use);
        $this->display();
    }
}
