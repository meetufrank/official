<?php


namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class RflinkertypeController extends ComController {
	
	//Rflinker系列产品
	public function index(){
		
		$list = M('rflinkertype')->order('rrtypesort')->select();
		$this->assign('list',$list);
		$this -> display();
	}
	//新增Rflinker系列产品
	public function add(){

		$this -> display();
	}
	//新增或修改Rflinker系列产品
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('rflinkertype')->where('id='.$id)->find();
		$this->assign('link',$link);
		$this -> display();
	}
	//删除Rflinker系列产品
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('rflinkertype')->where($map)->delete()){
				addlog('删除FELG系列产品，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存Rflinker系列产品
	public function update($id=0){
		$id = intval($id);
	    
		$data['cn_rflinkertypename'] = I('post.cn_rflinkertypename','','strip_tags');
		
		//类型中文名称不能为空
		if($data['cn_rflinkertypename'] == ''){
			$this -> error("类型中文名称不能为空!!!");
		}
		
		//类型中文名称不能重复
		$typecnnamewhere = "cn_rflinkertypename = "."'".$_POST['cn_rflinkertypename']."'";
		$typecnname = M('rflinkertype')->where($typecnnamewhere)->count();
		
		
		$data['en_rflinkertypename'] = I('post.en_rflinkertypename','','strip_tags');
		//类型英文名称不能为空
		if($data['en_rflinkertypename'] == ''){
			$this -> error("类型英文名称不能为空!!!");
		}
		
		//英文类型名称不能重复
		$typeennamewhere ="en_rflinkertypename = "."'".$_POST['en_rflinkertypename']."'";
		$typeenname = M('rflinkertype')->where($typeennamewhere)->count();
		
		
		
		$data['rrtypesort'] = I('post.rrtypesort','','strip_tags');
	
		if($id){
			M('rflinkertype')->data($data)->where('id='.$id)->save();
			addlog('修改RFLINKER频率，ID：'.$id);
		}else{
			M('rflinkertype')->data($data)->add();
			addlog('新增RFLINKER频率');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}