<?php


namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class IndexshowController extends ComController {
	
	//首页模块操作
	public function index(){
		
		$list = M('Indexshow')->select();
		$this->assign('list',$list);
		//print_r($list);exit;
		$this -> display();
	}
	//新增链接
	public function add(){

		$this -> display();
	}
	//新增或修改链接
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('Indexshow')->where('id='.$id)->find();
		//print_r($link);exit;
		$this->assign('link',$link);
		$this -> display();
	}
	//删除链接
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('links')->where($map)->delete()){
				addlog('删除友情链接，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存链接
	public function update($id=0){
		$id = intval($id);
		//felg
		$data['cn_fghzname'] = I('post.cn_fghzname','','strip_tags');
		$data['en_fghzname'] = I('post.en_fghzname','','strip_tags');
        $data['cn_fghzshow'] = I('post.cn_fghzshow','','strip_tags');
		$data['en_fghzshow'] = I('post.en_fghzshow','','strip_tags');
		
		
		//rflinker
		$data['cn_rrhzname'] = I('post.cn_rrhzname','','strip_tags');
		$data['en_rrhzname'] = I('post.en_rrhzname','','strip_tags');
        $data['cn_rrhzshow'] = I('post.cn_rrhzshow','','strip_tags');
		$data['en_rrhzshow'] = I('post.en_rrhzshow','','strip_tags');
		
		
		
		//推荐
		$data['cn_tjhzname'] = I('post.cn_tjhzname','','strip_tags');
		$data['en_tjhzname'] = I('post.en_tjhzname','','strip_tags');
        $data['cn_tjhzshow'] = I('post.cn_tjhzshow','','strip_tags');
		$data['en_tjhzshow'] = I('post.en_tjhzshow','','strip_tags');
		
		if($id){
			M('Indexshow')->data($data)->where('id='.$id)->save();
			addlog('修改首页模块是否开启，ID：'.$id);
		}else{
			M('Indexshow')->data($data)->add();
			addlog('新增模块是否开启');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}