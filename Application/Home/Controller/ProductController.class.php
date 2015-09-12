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
        $source=C('source');
        $this->assign('source',$source);
        $data['title']=array('exp',"is not Null");
        $data['custom_id']=array('ELT',"0");
        $data['activity_id']=array('ELT',"0");
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
        $order='issell asc,id desc';
        if($news>0){
        	if($news==1){
        		$order='money asc,issell asc,id desc';
        	}else{
        		$order='money desc,issell asc,id desc';
        	}
        	$dataf['news']=$news;
        }
        $worksModel =D('Works');
        $count      = $worksModel->where($data)->count();
        $pageshowcount=24;
        $Page       = new Page($count,$pageshowcount);
        $show       = $Page->pageshow();
        $workList = $worksModel->field("works_comic.id,works_comic.issell,works_comic.sellcate,works_comic.authorize,tags,create_status,title,works_comic.user_id,main_image_url,money,theme,user.header_img")->join('left join user on works_comic.user_id = user.id')->order($order)->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
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
    	$custom_id=I('get.custom_id','0');
    	$countupdat=0;
    	if($custom_id>0){
    		$works=D('Works')->where(array('custom_id'=>$custom_id))->order('id desc')->find();
    		$customModel=D('Custom');
    		$custom = $customModel->field('cusstatus')->find($custom_id);
    		if($custom['cusstatus']!='已确认完成'&&$custom['cusstatus']!='提出修改意见'){
    			$countupdat=D('customlog')->where(array('custom_id'=>$custom_id,'status'=>1))->count();
    		}
    	}
    	$this->assign('opinion',$countupdat);
    	if($id>0){
    		$works=D('Works')->find($id);
    	}
    	$User=D('User')->find($works['user_id']);
    	$worklist=D('Works')->getWorksByUserId($works['user_id'],3);
    	$data['ref_id']=$works['id'];
    	if($works['custom_id']||$works['activity_id']||$works['issell']!=1||$works['sellcate']!=1){
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
    	$con=mysql_connect("182.92.216.80","root","2cydb");
    	if (!$con)
    	{
    		die('Could not connect: ' . mysql_error());
    	}
    	mysql_select_db("v2_2cy", $con);
    	mysql_query("set names 'utf8'");
    	$sql="SELECT* FROM `v2_2cy`.`user` ORDER BY id DESC LIMIT 0, 300 ";
    	$list=mysql_query($sql,$con);
		while($row = mysql_fetch_array($list))
		  {
		  	
		  	$count=0;
		  	$count=D('User')->where('id='.$row['id'])->count();
		  	if($count==0){
		  	$data['id']=$row['id'];
		  	$data['user_name']=$row['user_name'];
		  	$data['nick_name']=$row['nick_name'];
		  	$data['password']=$row['password'];
		  	$data['mobile']=$row['mobile'];
		  	$data['gender']=$row['gender'];
		  	$data['email']=$row['email'];
		  	$data['birthday']=$row['birthday'];
		  	$data['header_img']=$row['header_img'];
		  	$data['header_img_sns']=$data['header_img_sns'];
		  	$data['author_flag']=$row['author_flag'];		  	
		  	$data['tags_content']=$row['tags_content'];
		  	$data['fans_count']=$row['fans_count'];
		  	$data['follow_count']=$row['follow_count'];
		  	$data['friend_count']=$row['friend_count'];
		  	$data['pop_count']=$row['pop_count'];
		  	$data['work_count']=$row['work_count'];
		  	$data['create_date']=$row['create_date'];
		  	$data['last_login_date']=$row['last_login_date'];
		  	$data['last_update_pwd']=$data['last_update_pwd'];
		  	$data['love_status']=$row['love_status'];
		  	$data['love_type']=$row['love_type'];
		  	$data['blog_url']=$row['blog_url'];
		  	$data['qq_no']=$data['qq_no'];
		  	$data['intro']=$row['intro'];
		  	$data['address']=$row['address'];
		  	$data['LEVEL']=$row['LEVEL'];
		  	$data['status']=$data['status'];
		  	$data['qq_no']=$data['qq_no'];
		  	D('User')->add($data);
		  	}
		  }
		mysql_close($con);
    }
}
