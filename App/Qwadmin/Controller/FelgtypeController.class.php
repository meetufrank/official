<?php

namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class FelgtypeController extends ComController {
	
	//FELG系列产品类型分类
	public function index(){
		
		$list = M('felgtype')->order('fgtypesort asc')->select();
		$this->assign('list',$list);
		$this -> display();
	}
	//新增FELG系列产品类型分类
	public function add(){

		$this -> display();
	}
	//新增或修改FELG系列产品类型分类
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('felgtype')->where('id='.$id)->find();
		$this->assign('link',$link);
		$this -> display();
	}
	//删除FELG系列产品类型分类
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('felgtype')->where($map)->delete()){
				addlog('删除友情FELG系列产品类型分类，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存FELG系列产品类型分类
	public function update($id=0){
		$id = intval($id);
		$data['cn_fgtypename'] = I('post.cn_fgtypename','','strip_tags');
		$data['en_fgtypename'] = I('post.en_fgtypename','','strip_tags');
		$data['fgtypesort'] = I('post.fgtypesort','','strip_tags');
		
		if($id){
			M('felgtype')->data($data)->where('id='.$id)->save();
			addlog('修改友情FELG系列产品类型分类，ID：'.$id);
		}else{
			M('felgtype')->data($data)->add();
			addlog('新增友情FELG系列产品类型分类');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}