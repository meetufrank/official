<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class FeighztypeController extends ComController {
    public function index(){
	
        //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);
		
		
		//查询出频率
		$felghz = M("felghz");
		$felghzselect = "id,".$language."fghz as hzname";
		$hzlist = $felghz->field($felghzselect)->order('fghzsort')->select();
		
		
		//查询出类型
		$felgtype = M("felgtype");
		$felgtypeselect = "id,".$language."fgtypename as fgtypename,".$language."hzid as hzid";
		$typelist = $felgtype->field($felgtypeselect)->order('fgtypesort')->select();
		
		$hztype_arr = [];
		foreach($hzlist as $key=>$value){  
			foreach($typelist as $k=>$v){
				if($v['hzid']==$value['id']){
					$hztype_arr[$key]['hz']=$value;
					$hztype_arr[$key]['type'][]=$v;
				}
			}
		}
	
		$this -> assign('hztype_arr',$hztype_arr);
		
		
		$typeid = $_GET['typeid'];
		$fid = $_GET['fid'];
		
		
		//取出该频率下的所有类型
		$felgtype = M('felgtype');
		$selecttypeyi ="id,".$language."fgtypename as fgtypename,".$language."hzid as hzid";
		$typeyiwhere =$language."hzid = $fid";
		$typeyi = $felgtype->order('fgtypesort')->where($typeyiwhere)->field($selecttypeyi)->select();
		

		//取出所有产品
		$felgproduct = M('felgproduct');
		$ptsselect ="id,".$language."ftname as ftname,".$language."ftimg as ftimg,".$language."fttitle as ftitle,".$language."tid as tid";
		$hztypept = $felgproduct->order("ftsort asc")->field($ptsselect)->select();
		
		$hztypes_arr = [];
		foreach($typeyi as $key => $value){
			
			foreach($hztypept as $k=>$v){
				
				if($v['tid']==$value['id']){
					
					
					$hztypes_arr[$key]['pt'][] = $v;
				}
				$hztypes_arr[$key]['type'] = $value;
			}
		}
		
		$this -> assign('hztypes_arr',$hztypes_arr);
		
		
		
		
		$this -> assign('typeid',$typeid);
		$this->display(); 
		

    }

	
	
	



}