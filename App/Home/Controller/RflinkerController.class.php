<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class RflinkerController extends ComController {
    public function index(){
		
         //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);
		
		
		//查询出频率
		$rflinkerhz = M("rflinkerhz");
		$rflinkerhzselect = "id,".$language."rflinkerhz as hzname";
		$hzlist = $rflinkerhz->field($rflinkerhzselect)->order('rrsort')->select();
		
		
	
		
		//查询出类型
		$rflinkertype = M("rflinkertype");
		$rflinkertypeselect = "id,".$language."rflinkertypename as rflinkertypename,".$language."hzid as hzid";
		$typelist = $rflinkertype->field($rflinkertypeselect)->order('rrtypesort')->select();
		
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
		
		
		
		//页面第一次加载,第一个频率下的类型和产品
	    //频率
		//取出频率第一条id
		$rflinkerhz = M('rflinkerhz');
		$selecthzyi ="id,".$language."rflinkerhz as rflinkerhz";
		$hzyiwhere = "$languagerflinkerhz";
		$hzyi = $rflinkerhz->order('rrsort')->where($hzyiwhere)->limit(1)->field($selecthzyi)->select();
		$hzyiid = $hzyi[0]['id'];
		$hzyirflinkerhz = $hzyi[0]['rflinkerhz'];
				
		$this -> assign('hzyiid',$hzyiid);
	    $this -> assign('hzyirflinkerhz',$hzyirflinkerhz);
		
		
		//取出第一个频率下的所有类型
		$rflinkertype = M('rflinkertype');
		$selecttypeyi ="id,".$language."rflinkertypename as rflinkertypename,".$language."hzid as hzid";
		$typeyiwhere =$language."hzid = $hzyiid";
		$typeyi = $rflinkertype->order('rrtypesort')->where($typeyiwhere)->field($selecttypeyi)->select();
		
		//print_r($typeyi);exit;

		//取出所有产品
		$rflinkerproduct = M('rflinkerproduct');
		$ptsselect ="id,".$language."rrname as rrname,".$language."rrimg as rrimg,".$language."rrtitle as rrtitle,".$language."tid as tid";
		$hztypept = $rflinkerproduct->order("rrsort")->field($ptsselect)->select();
	/* 	echo M('rflinkerproduct')->getlastsql();
		exit;  */
		$hztypes_arr = [];
		foreach($typeyi as $key => $value){
			
			foreach($hztypept as $k=>$v){
				$hztypes_arr[$key]['type'] = $value;
				if($v['tid']==$value['id']){
					
					
					$hztypes_arr[$key]['pt'][] = $v;
					
				}
			}
		}
		//print_r($hztypes_arr);exit;
	
		$this -> assign('hztypes_arr',$hztypes_arr);
	    
		
		$this->display(); 
		
    }
	
	
	
	
}