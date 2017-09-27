<?php
/**
*
* 版权所有：恰维网络<qwadmin.qiawei.com>
* 作    者：寒川<hanchuan@qiawei.com>
* 日    期：2016-01-21
* 版    本：1.0.0
* 功能说明：前台公用控制器。
*
**/

namespace Home\Controller;
use Think\Controller;
class ComController extends Controller {

	public function _initialize(){
		
		C(setting());
		$this->assign('style_change',CONTROLLER_NAME);
		//1.两个系列产品名称
		//2.根据是否推荐搜索查询
		 //判断当前语言
		$language = L('language');
		$this->assign('language',$language);
		
		//feig产品
		$felgproduct = M('felgproduct');
		$selectfeig="id,".$language."ftname as name,xl_type";
		//$feig = $felgproduct->order('ftsort')->where('search = 1')->getField($selectfeig);
		//$this->assign('feig',$feig);
		//print_r($feig);exit;
		
		
		//rflinker 产品
		$rflinkerproduct = M('rflinkerproduct');
		$selectrr="id,".$language."rrname as name,xl_type";
		//$rr = $rflinkerproduct->where('search = 1')->order('rrsort')->getField($selectrr);
		//$this->assign('rr',$rr);
		//print_r($rr);exit;
		
		
		//常用
		$live_arr=$felgproduct->where('search = 1')->field($selectfeig)
->union('SELECT '.$selectrr.' FROM qw_rflinkerproduct where search=1')
->select();

$i=0;

      foreach($live_arr as $key=>$value){
		  $new_live[$i][0]=U('Productdetails/index?type='.$value['xl_type'].'&id='.$value['id']);
		  
		  $new_live[$i][1]=$value['name'];
		  $new_live[$i][2]=' ';
		  $new_live[$i][3]=' ';
		  if(!$value['name']){
			  unset($new_live[$i]);
		  }else{
			  $i++;
		  }
		  
	  }
	  
	  //print_r($new_live);exit;
	  //$this->assign('new_live_arr',$new_live);
		$this->assign('new_live',json_encode($new_live));
		
		//所有
		$live_arr_all=$felgproduct->field($selectfeig)
->union('SELECT '.$selectrr.' FROM qw_rflinkerproduct ')
->select();

$i=0;

      foreach($live_arr_all as $key=>$value){
		  $new_live_all[$i][0]=U('Productdetails/index?type='.$value['xl_type'].'&id='.$value['id']);
		  
		  $new_live_all[$i][1]=$value['name'];
		  $new_live_all[$i][2]=' ';
		  $new_live_all[$i][3]=' ';
		  if(!$value['name']){
			  unset($new_live_all[$i]);
		  }else{
			  $i++;
		  }
		  
	  }
		
		$this->assign('new_live_all',json_encode($new_live_all));
		
		
	  
		/*
		$links = M('links')->limit(10)->order('o ASC')->select();
		$this->assign('links',$links);
		*/
    }
	
	
}