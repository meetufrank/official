<?php

namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class FelgtypeController extends ComController {
	
	//FELG系列产品类型分类
	public function index(){
	    $hz_list = M('felghz')->order('fghzsort asc')->select();
		$this -> assign('hz_list',$hz_list);
	
		$enorder = isset($_GET['enorder'])?intval($_GET['enorder']):0;
		
		if($enorder != 0){
			$map = 'en_hzid = '.$enorder;
		}else{
			$map = "";
		}
		
		$count= M('felgtype')->where($map)->count();// 查询满足要求的总记录数
		//print_r($count);exit;
        $Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出

        $result=D('felgtype')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order("fgtypesort asc")->select();
							
        $this->assign('page',$show);

        $this->assign('list',$result);
		//print_r($order);exit;
		$this -> display();
	}
	//新增FELG系列产品类型分类
	public function add(){
		
		$hz_list = M('felghz')->order('fghzsort asc')->select();
		//print_r($hz_list);exit;
        $this -> assign('hz_list',$hz_list);
		$this -> display();
	}
	//新增或修改FELG系列产品类型分类
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('felgtype')->where('id='.$id)->find();
		$cnhzid = $link['cn_hzid'];
		$enhzid = $link['en_hzid'];
		
		$hz_list = M('felghz')->order('fghzsort asc')->select();
		$this -> assign('hz_list',$hz_list);
		
		//中文频率
		$Model = M('felgtype');
		$hzcn = $Model
		->join("qw_felghz as z ON qw_felgtype.cn_hzid = z.id")
		->where("qw_felgtype.id = ".$id)
		->select(); 
		$hzcnid = $hzcn[0]['id'];
		$hzcnfghz = $hzcn[0]['cn_fghz'];
		$this->assign('hzcnid',$hzcnid);
		$this->assign('hzcnfghz',$hzcnfghz);
		
		
		
		/* print_r($hzcn[0]['id']);
		print_r($hzcn[0]['cn_fghz']);exit; */
		//英文频率hzcn
		$Model = M('felgtype');
		$hzen = $Model
		->join("qw_felghz as z ON qw_felgtype.en_hzid = z.id")
		->where('qw_felgtype.id = '.$id)
		->select();
        
	    $hzenid = $hzen[0]['id'];
		$hzenfghz = $hzen[0]['en_fghz'];
		$this->assign('hzenid',$hzenid);
		$this->assign('hzenfghz',$hzenfghz);
		
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
	    $data['cn_hzid'] = I('post.cn_hzid','','strip_tags');
		$data['en_hzid'] = I('post.en_hzid','','strip_tags');
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