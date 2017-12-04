<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class RflinkerhztypeController extends ComController {
    public function index(){
	
        //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);
		
		
		//查询出频率
		$rflinkerhz = M("rflinkerhz");
		$rflinkerhzselect = "id,".$language."rflinkerhz as rflinkerhz";
		$hzlist = $rflinkerhz->field($rflinkerhzselect)->order('rrsort')->select();
	
		
		//查询出类型
		$rflinkertypes = M("rflinkertype");
		$rflinkertypeselect = "id,".$language."rflinkertypename as fgtypename,".$language."hzid as hzid";
		$typelist = $rflinkertypes->field($rflinkertypeselect)->order('rrtypesort')->select();
		
		$hztype_arr = [];
		foreach($hzlist as $key=>$value){  
			foreach($typelist as $k=>$v){
				if($v['hzid']==$value['id']){
					$hztype_arr[$key]['hz']=$value;
					$hztype_arr[$key]['type'][]=$v;
				}
			}
		}
		//print_r($hztype_arr);exit;
		$this -> assign('hztype_arr',$hztype_arr);
		
		
		$typeid = $_GET['typeid'];
		$fid = $_GET['fid'];
		
		
		//取出该频率下的所有类型
		$rflinkertype = M('rflinkertype');
		$selecttypeyi ="id,".$language."rflinkertypename as fgtypename,".$language."hzid as hzid";
		$typeyiwhere =$language."hzid = $fid";
		$typeyi = $rflinkertype->order('rrtypesort')->where($typeyiwhere)->field($selecttypeyi)->select();
		

		//取出所有产品
		$rflinkerproduct = M('rflinkerproduct');
		$ptsselect ="id,".$language."rrname as ftname,".$language."rrimg as ftimg,".$language."rrtitle as ftitle,".$language."tid as tid";
		$hztypept = $rflinkerproduct->order("rrsort asc")->field($ptsselect)->select();
		
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