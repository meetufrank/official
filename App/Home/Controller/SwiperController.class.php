<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class SwiperController extends ComController {
    public function index(){
	
        //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);
		
		$hzid = $_GET['fid'];
		$typeid = $_GET['typeid'];
		
		
		//根据频率和类型id,产品
		$felgproduct = M('felgproduct');
		$ptwhere =$language."hzid = $hzid and ".$language."tid = ".$typeid;	
		$ptsselect ="id,".$language."ftname as ftname,".$language."ftimg as ftimg,".$language."fttitle as ftitle,".$language."tid as tid";
		$hztypept = $felgproduct->order("ftsort")->where($ptwhere)->field($ptsselect)->select();
		
		//print_r($hztypept);
		$this -> assign('hztypept',$hztypept);
	
		
		$this->display(); 
		

    }

	
	


}