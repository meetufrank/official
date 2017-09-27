<?php


namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class TuijianController extends ComController {
	
	//首页推荐显示
	public function index(){
		
		$list = M('tuijian')->order('tjsotr')->select();
		$this->assign('list',$list);
		
		//print_r($list);exit;
		$this -> display();
	}
	//新增推荐
	public function add(){
        //FEIG产品
		$felg = M('felgproduct');
		$felgs = $felg->order('ftsort')->select();
	    //print_r($felgs);exit;
		$this -> assign('felgs',$felgs);
		
		
		
		//RFLINKER产品
		$rflinker = M('rflinkerproduct');
		$rflinkers = $rflinker->order('rrsort')->select();
		//print_r($rflinkers);exit;
		$this -> assign('rflinkers',$rflinkers);
		
		
		//判断推荐产品是否超过4条
		$tuijian = M('tuijian');
		$ptcount = $tuijian ->count();
		//print_r($ptcount);exit;
		
		if($ptcount >= 4){
			$this -> error("推荐产品已超过4条,添加前,请删除!!!");
		}
		
		$this -> display();
	}
	//新增或修改推荐
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('links')->where('id='.$id)->find();
		$this->assign('link',$link);
		$this -> display();
	}
	//删除推荐
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('tuijian')->where($map)->delete()){
				addlog('删除首页推荐，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存推荐
	public function update($id=0){
		$id = intval($id);
		
		$data['type'] = I('post.click','','strip_tags');
		//felg产品
		if($data['type'] == 1){
			
			
			$data['cn_felgname'] = I('post.felgcn','','strip_tags');
			//felg产品中文
			if($data['cn_felgname']!= '' or $data['cn_felgname']!= '0'){
				$felgproduct = M('felgproduct');
				$felgcnwehere = "cn_ftname = "."'".$data['cn_felgname']."'";
				$felgcn = $felgproduct->where($felgcnwehere)->field('id,cn_ftname,cn_fttitle, cn_ftimg')->find();
				$data['cn_pttitle'] = $felgcn['cn_fttitle'];
				$data['cn_ptimg'] = $felgcn['cn_ftimg'];		
			}
			
			//felg产品英文
		    $data['en_felgname'] = I('post.felgen','','strip_tags');
			if($data['en_felgname']!= '' or $data['en_felgname']!= '0'){
				$felgproduct = M('felgproduct');
				$felgenwehere = "en_ftname = "."'".$data['en_felgname']."'";
				$felgen = $felgproduct->where($felgenwehere)->field('id,en_ftname,en_fttitle,en_ftimg')->find();
				$data['en_pttitle'] = $felgen['en_fttitle'];
				$data['en_ptimg'] = $felgen['en_ftimg'];		
			}
			
			
		}elseif($data['type'] == 2){
			//rflinker中文
			$data['cn_rrname'] = I('post.rrcn','','strip_tags');
			if($data['cn_rrname'] != '' or $data['cn_rrname'] != '0'){
				$rflinkerproduct = M('rflinkerproduct');
				$rrcnwhere = "cn_rrname ="."'".$data['cn_rrname']."'";
				$rrcn = $rflinkerproduct->where($rrcnwhere)->field('cn_rrtitle,cn_rrimg')->find();
				$data['cn_pttitle'] = $rrcn['cn_rrtitle'];
				$data['cn_ptimg'] = $rrcn['cn_rrimg'];	
			}
			
			
		   //rflinker英文
		    $data['en_rrname'] = I('post.rren','','strip_tags');
			if($data['en_rrname'] != '' or $data['en_rrname'] != '0'){
				$rflinkerproduct = M('rflinkerproduct');
				$rrenwhere = "en_rrname ="."'".$data['en_rrname']."'";
				$rren = $rflinkerproduct->where($rrenwhere)->field('en_rrtitle,en_rrimg')->find();
				$data['en_pttitle'] = $rren['en_rrtitle'];
				$data['en_ptimg'] = $rren['en_rrimg'];	
			}
			
			
			
		}elseif($data['type'] == ''){
			$this->error("请选择产品种类!!!");
		}
		
		
		$data['tjsotr'] = I('post.rrsort','','strip_tags');
		
		
		
		
		if($id){
			M('tuijian')->data($data)->where('id='.$id)->save();
			addlog('修改推荐产品，ID：'.$id);
		}else{
			M('tuijian')->data($data)->add();
			addlog('新增推荐产品');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}