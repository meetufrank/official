<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class RflinkerswiperController extends ComController {
    public function index(){
	
        //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);
		
		$hzid = $_GET['fid'];
		$typeid = $_GET['typeid'];
	
		
		
		
		//根据频率和类型id,产品
		$rflinkerproduct = M('rflinkerproduct');
		$ptwhere =$language."hzid = $hzid and ".$language."tid = ".$typeid;	
		$ptsselect ="id,".$language."rrname as rrname,".$language."rrimg as rrimg,".$language."rrtitle as rrtitle,".$language."tid as tid";
		$hztypept = $rflinkerproduct->order("rrsort")->where($ptwhere)->field($ptsselect)->select();
		
		//echo M('rflinkerproduct')->getlastsql();exit;
		//print_r($hztypept);exit;
		$this -> assign('hztypept',$hztypept);
	
		
		$this->display(); 
		

    }

	
	


}