<?php


namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class RflinkerhzController extends ComController {
	
	//RFLINKER系列产品
	public function index(){
		
		$list = M('rflinkerhz')->order('rrsort')->select();
		$this->assign('list',$list);
		//print_r($list);exit;
		$this -> display();
	}
	//新增RFLINKER系列产品
	public function add(){

		$this -> display();
	}
	//新增或修改RFLINKER系列产品
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('rflinkerhz')->where('id='.$id)->find();
		$this->assign('link',$link);
		//print_r($link);exit;
		$this -> display();
	}
	//删除RFLINKER系列产品
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('rflinkerhz')->where($map)->delete()){
				addlog('删除RFLINKER系列产品，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	
	
	//保存RFLINKER系列产品
	public function update($id=0){
		$id = intval($id);
	    
		$data['cn_rflinkerhz'] = I('post.cn_rflinkerhz','','strip_tags');
		
		
        $postcnname = $_POST['cn_rflinkerhz'];
        $cnhzname = "cn_rflinkerhz = "."'$postcnname'";
		$cnhzname = M('rflinkerhz')->where($cnhzname)->count();
		
		
		$data['en_rflinkerhz'] = I('post.en_rflinkerhz','','strip_tags');
		
		$enhzname = "en_rflinkerhz = "."'".$_POST['en_rflinkerhz']."'";
		
		$enhzname = M('rflinkerhz')->where($enhzname)->count();
		
		
		//频率标题
		$data['cn_rrtitle'] = I('post.cn_rrtitle','','strip_tags');
		$data['en_rrtitle'] = I('post.en_rrtitle','','strip_tags');
		
		//频率图片
		$cn_rrimg = I('post.cn_rrimg','','strip_tags');
		if($cn_rrimg<>'') {
			$data['cn_rrimg'] = $cn_rrimg;
		}
		
		$en_rrimg = I('post.en_rrimg','','strip_tags');
		if($en_rrimg<>'') {
			$data['en_rrimg'] = $en_rrimg;
		}
		
		$data['rrsort'] = I('post.rrsort','','strip_tags');
	
		if($id){
			M('rflinkerhz')->data($data)->where('id='.$id)->save();
			addlog('修改RFLINKER频率，ID：'.$id);
		}else{
			if($data['cn_rflinkerhz'] == ''){
			   $this -> error('中文频率不能为空!!!');
		    }
			if($data['en_rflinkerhz'] == ''){
			   $this -> error('英文频率不能为空!!!');
		    }
			if($cnhzname == 1){	
			   $this -> error('该中文频率已存在!!!');
		    }
			if($enhzname == 1){	
			   $this -> error('该英文频率已存在!!!');
		    }
			M('rflinkerhz')->data($data)->add();
			addlog('新增RFLINKER频率');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}