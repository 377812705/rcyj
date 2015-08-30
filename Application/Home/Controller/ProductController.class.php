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
        //$data['custom_id']=array('exp',"is Null");
       // $data['activity_id']=array('exp',"is Null");
        $create_status=I('get.create_status');
        if($create_status>0){
        	$data['create_status']=$create_status;
        	$dataf['create_status']=$create_status;
        }
        $cate=I('get.cate');
        if($cate>0){
        	$data['cate']=$cate;
        	$dataf['cate']=$cate;
        }
        $theme=I('get.theme');
        if($theme>0){
        	$data['theme']=$theme;
        	$dataf['theme']=$theme;
        }
        $news=I('get.news');
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
        $workList = $worksModel->field("works_comic.id,tags,create_status,title,works_comic.user_id,main_image_url,money,theme,user.header_img")->join('left join user on works_comic.user_id = user.id')->order($order)->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
        $this->assign('works',$workList);
        $this->assign('show',$show);
        $this->assign('wcount',$count);
        $tags=C('tag');
        $this->assign('tags',$tags);
        $this->assign('dataf',$dataf);
        $cate=C('cate');
        $this->assign('cate',$cate);
        $theme=C('theme');
        $this->assign('theme',$theme);
        $this->display();
    }
    public function details(){
    	$id=I('get.id','');
    	$works=D('Works')->find($id);
    	$User=D('User')->find($works['user_id']);
    	$worklist=D('Works')->getWorksByUserId($works['user_id'],3);
    	$data['ref_id']=$works['id'];
    	if($works['custom_id']||$works['activity_id']){
    		$works['showmoney']='no';
    	}else{
    		$works['showmoney']='yes';
    	}
    	$imgs=D('Img')->where($data)->select();
    	$this->assign('imgs',$imgs);
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
    function daorushuju(){
    	set_time_limit(0);
    	header("Content-Type: text/html;charset=utf-8");
    	$con=mysql_connect("tongji.2ciyuanjie.com","root","2cydb");
    	if (!$con)
    	{
    		die('Could not connect: ' . mysql_error());
    	}
    	mysql_select_db("v2_2cy", $con);
    	mysql_query("set names 'utf8'");
    	$sql="SELECT * FROM works_cartoon_image";
    	$list=mysql_query($sql,$con);
		while($row = mysql_fetch_array($list))
		  {
		  	$data['id']=$row['id'];
		  	$data['user_id']=$row['user_id'];
		  	$data['main_image_url']=$row['main_image_url'];
		  	$data['title']=$row['title'];
		  	$data['workrole']=$row['role_content'];
		  	$data['workrole']=$row['story'];
		  	$data['praise_count']=$row['praise_count'];
		  	$data['favorite_count']=$row['favorite_count'];
		  	$data['comment_count']=$row['comment_count'];
		  	$data['share_count']=$row['share_count'];
		  	$data['open_count']=$row['open_count'];
		  	$data['create_status']=3;
		  	$data['status']=$row['status'];
		  	$data['create_date']=$row['create_date'];
		  	$data['update_date']=$row['update_date'];
		  	$data['copy_right']=$row['copy_right'];
		  	$data['group_level']=$row['group_level'];
		  	$data['tags']=1;
		  	$data['show']=1;
		  	$data['cate']=1;
		  	$data['activity_id']=1;
		  	$data['theme']=8;
		  	$id=D('Works')->add($data);
		  	$sql1="SELECT * FROM `v2_2cy`.`user_image` WHERE ref_id=".$row['id']." AND ref_type='works_cartoon'";
		  	$list1=mysql_query($sql1,$con);
		  	while($row1 = mysql_fetch_array($list1))
		  	{
		  		$data1['id']=$row1['id'];
		  		$data1['user_id']=$row1['user_id'];
		  		$data1['ref_id']=$row1['ref_id'];
		  		$data1['ref_type']=1;
		  		$data1['sort_num']=$row1['sort_num'];
		  		$data1['image_url']=$row1['image_url'];
		  		$data1['create_date']=$row1['create_date'];
		  		$data1['extra_info']=$row1['extra_info'];
		  		$id1=D('Img')->add($data1);
		  	}
		  }
		mysql_close($con);
    }
}
