<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class VocationlistController extends ComController {
    public function index(){
		//判断当前语言
		$language = L('language');
		$this->assign('language',$language);
		$industry = M('industry');
		$industrycount = $industry -> count();
		//print_r($industrycount);exit;
		$this -> assign('industrycount',$industrycount);
		$this -> display();	
    }

   
   
    public function getlist($p){
		//判断当前语言
		$language = L('language');
		$this->assign('language',$language);
		
        $industry = D('industry');
		
		$perpage = 4;     //每页显示几条
		//一个有多少条数据
		$sqlcount ="select count(*) as count from qw_industry";
		$icount = $industry->query($sqlcount);
		//$icount[0]['count'] 总条数
		$_count = ceil($icount[0]['count'] / $perpage);
		//$_count;   总页数
		
		if(!isset($p)){
			$p = 1;
		}else{
			$p = $p;
			if($p > $_count){
				$p = $_count;
			}
		}
	
		
		
		
		$offset =($p-1)*$perpage;       //当前页数
		
		
	
		
		
		$selectlist="id,({$_count}) as count,".$language."nameiy as nameiy,".$language."imgiy as imgiy,iysort";
		$sql = "select $selectlist from qw_industry order by iysort limit $offset,$perpage";
		
		$data = $industry->query($sql);
		
		
		
		
		
		
		
		//print_r($icount[0]['count']);exit;
		
		echo json_encode($data);
		/* print_r($data);exit; */
		
	}
   
   
   
   
   


}