<?php


namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class RflinkertypeController extends ComController {
	
	//Rflinker系列产品
	public function index(){
		
		/* $list = M('rflinkertype')->order('rrtypesort')->select();
		$this->assign('list',$list);
		$this -> display(); */
		
		
		$hz_list = M('rflinkerhz')->order('rrsort asc')->select();
		$this -> assign('hz_list',$hz_list);
		
		//print_r($hz_list);exit;
	
		$enorder = isset($_GET['enorder'])?intval($_GET['enorder']):0;
		
		if($enorder != 0){
			$map = 'en_hzid = '.$enorder;
		}else{
			$map = "";
		}
		
		$count= M('rflinkertype')->where($map)->count();// 查询满足要求的总记录数
		//print_r($count);exit;
        $Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出

        $result=D('rflinkertype')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order("rrtypesort asc")->select();
							
        $this->assign('page',$show);
        $this -> assign('enorder',$enorder);
        $this->assign('list',$result);
		//print_r($order);exit;
		$this -> display();
		
		
	}
	//新增Rflinker系列产品
	public function add(){
	    $hz_list = M('rflinkerhz')->order('rrsort asc')->select();
		//print_r($hz_list);exit;
        $this -> assign('hz_list',$hz_list);

		$this -> display();
	}
	//新增或修改Rflinker系列产品
	public function edit($id=null){
		
		
		$link = M('rflinkertype')->where('id='.$id)->find();
		$cnhzid = $link['cn_hzid'];
		$enhzid = $link['en_hzid'];
		
		$hz_list = M('rflinkerhz')->order('rrsort asc')->select();
		$this -> assign('hz_list',$hz_list);
		
		//中文频率
		$Model = M('rflinkertype');
		$hzcn = $Model
		->join("qw_rflinkerhz as z ON qw_rflinkertype.cn_hzid = z.id")
		->where("qw_rflinkertype.id = ".$id)
		->select(); 
		$hzcnid = $hzcn[0]['id'];
		$hzcnfghz = $hzcn[0]['cn_rflinkerhz'];
		$this->assign('hzcnid',$hzcnid);
		$this->assign('hzcnfghz',$hzcnfghz);
		
		
		//英文频率hzcn
		$Model = M('rflinkertype');
		$hzen = $Model
		->join("qw_rflinkerhz as z ON qw_rflinkertype.en_hzid = z.id")
		->where('qw_rflinkertype.id = '.$id)
		->select();
        
	    $hzenid = $hzen[0]['id'];
		$hzenfghz = $hzen[0]['en_rflinkerhz'];
		
		//print_r($hzen);exit;
		$this->assign('hzenid',$hzenid);
		$this->assign('hzenfghz',$hzenfghz);
		
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
		$data['en_rflinkertypename'] = I('post.en_rflinkertypename','','strip_tags');
		
		
	    $data['cn_hzid'] = I('post.cn_hzid','','strip_tags');
		$data['en_hzid'] = I('post.en_hzid','','strip_tags');
		
		
		
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