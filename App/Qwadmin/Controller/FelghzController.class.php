<?php


namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class FelghzController extends ComController {
	
	//FELG系列产品
	public function index(){
		
		$list = M('felghz')->order('fghzsort asc')->select();
		$this->assign('list',$list);
		
		$this -> display();
	}
	//新增FELG系列产品
	public function add(){

		$this -> display();
	}
	//新增或修改FELG系列产品
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('felghz')->where('id='.$id)->find();
		//print_r($link);exit;
		$this->assign('link',$link);
		$this -> display();
	}
	//删除FELG系列产品
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('felghz')->where($map)->delete()){
				addlog('删除FELG系列产品，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存FELG系列产品
	public function update($id=0){
		$id = intval($id);
	    	
		$data['cn_fghz'] = I('post.cn_fghz','','strip_tags');	
		
		
		//判断不能重复上传频率中文
		$cnfghzwhere = "cn_fghz ="."'".$_POST['cn_fghz']."'";
		$cnfelghzyi = M('felghz')->where($cnfghzwhere)->count();
		
		//判断不能重复上传频率英文
		$enfghzwhere = "en_fghz ="."'".$_POST['en_fghz']."'";
		$enfelghzyi = M('felghz')->where($enfghzwhere)->count();
		
		
		$data['en_fghz'] = I('post.en_fghz','','strip_tags');
		

		$data['fghzsort'] = I('post.fghzsort','','strip_tags');
		
		//标题
		$data['cn_fghztitle'] = I('post.cn_fghztitle','','strip_tags');
		$data['en_fghztitle'] = I('post.en_fghztitle','','strip_tags');
		
		
		//图片
		$cn_fghzimg = I('post.cn_fghzimg','','strip_tags');
		if($cn_fghzimg<>'') {
			$data['cn_fghzimg'] = $cn_fghzimg;
		}
		
		
		$en_fghzimg = I('post.en_fghzimg','','strip_tags');
		if($en_fghzimg<>'') {
			$data['en_fghzimg'] = $en_fghzimg;
		}
	
		if($id){
			M('felghz')->data($data)->where('id='.$id)->save();
			addlog('修改FELG频率，ID：'.$id);
		}else{
			//判断不能为空
			if($data['cn_fghz'] == ''){
				$this -> error('中文FELG频率不能为空!!!');
			}
			if($data['en_fghz'] == ''){
			    $this -> error('英文FELG频率不能为空!!!');
		    }
			if($cnfelghzyi == 1){
			    $this -> error("该中文频率已存在!!!");
		    }
			if($enfelghzyi == 1){
			    $this -> error("该英文频率已存在!!!");
		    }
			M('felghz')->data($data)->add();
			addlog('新增FELG频率');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}