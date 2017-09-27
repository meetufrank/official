<?php
/**
下载用户模块
**/

namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class DwuserController extends ComController {
	
	//下载用户
	public function index(){
		//print_r($count);exit;
		//$list = M('dwuser')->order('o asc')->select();
		
		$count= M('dwuser')->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		$result=D('dwuser')->limit($Page->firstRow.','.$Page->listRows)->order('o')->select();
		$this->assign('page',$show);
		$this->assign('list',$result);
		//$this->assign('list',$list);
		
		
		$this -> display();
	}
	//新增下载用户
	public function add(){

		$this -> display();
	}
	//新增或修改下载用户
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('dwuser')->where('id='.$id)->find();
		$this->assign('link',$link);
		$this -> display();
	}
	//删除下载用户
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('dwuser')->where($map)->delete()){
				addlog('删除友情下载用户，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存下载用户
	public function update($id=0){
		$id = intval($id);
		$data['dowusername'] = I('post.dowusername','','strip_tags');
		if(!$data['dowusername']){
			$this->error('请填写用户名！');
		}
		
		
		$data['dowuserpwd'] = I('post.dowuserpwd','','strip_tags');
		if(!$data['dowuserpwd']){
			$this->error('请填写密码！');
		}
		$data['dowremark'] = I('post.dowremark','','strip_tags');
		$data['o'] = I('post.o','','strip_tags');

		if($id){
			
			//验证用户名是否重复
			$whereUserName = "id = ".$id;
			$user = M('dwuser')->where($whereUserName)->find();
			//修改用户名不等于本身用户名
			if($data['dowusername'] != $user['dowusername']){
				//等于除自己外，其他用户名的名字
				//验证用户名是否重复
				$isUserName = "dowusername = '".$data['dowusername']."'";
				$isUser = M('dwuser')->where($isUserName)->find();
				if($isUser){
					$this->error('用户名不能重复!!!');
				}
				
			}
			 
		
			
			M('dwuser')->data($data)->where('id='.$id)->save();
			addlog('修改友情下载用户，ID：'.$id);
		}else{
			//验证用户名是否重复
			$whereUserName = "dowusername = '".$data['dowusername']."'";
			$user = M('dwuser')->where($whereUserName)->find();
			if($user){
				$this->error('用户名不能重复!!!');
			}
			
			
			M('dwuser')->data($data)->add();
			addlog('新增友情下载用户');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
	
	
	
	
	
	
	//用户下载
	public function userdown(){
		
		//赋值用户下载id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);
		
		$where = "dwuserid = $id";
		$dwuserdown = M('dwuserdown');
		$list = $dwuserdown->where($where)->order('o')->select();

		$this -> assign('list',$list);
		$this -> display();
	}
	
	
	//用户下载增加
	public function useradd(){
		
		//用户下载id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);
		
	    //print_r($id);exit;
		$this -> display();
	}
	
	
	//用户下载删除
	public function dwdel(){
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;

		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('dwuserdown')->where($map)->delete()){
				addlog('删除友情下载用户，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}

	}
	
	
	
	//用户下载修改显示
	public function userdownedit(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);

		$dwuserdown = M('dwuserdown');
		$where = "id = $id";
		$fgdown = $dwuserdown->where($where)->find();

//print_r($fgdown);exit;
		$this -> assign('fgdown',$fgdown);
		$this -> display();
	}
	
	
	//用户下载修改
	public function userdownedits(){

		$id = $_POST['id'];

		$dwuserdown = M('dwuserdown');

		$fuid = $dwuserdown->where("id = $id")->getField('dwuserid');


		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     6145728 ;// 设置附件上传大小
		$upload->exts      =     array( 'jpg','gif', 'png', 'jpeg','pdf','txt','sql','rar');// 设置附件上传类型
		$upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName  = ''; // 可以保存原文件名
	    $upload->replace  = true; // 可以覆盖文件
		// 上传文件
		$info   =   $upload->upload();



        if($info){
			$data['cn_down'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_down'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_downname'] = $info[0]['name'];
		    $data['en_downname'] = $info[1]['name'];
		}

				$data['dwuserid'] = $fuid;
		$data['cn_downname'] = $_POST['cn_downname'];
		$data['en_downname'] = $_POST['en_downname'];
		$data['o'] = $_POST['downsort'];

		M('dwuserdown')->data($data)->where('id='.$id)->save();
		//$felgptdown->where("id = $id")->save($data); // 根据条件更新记录
		$this->success('恭喜，操作成功！',U('Dwuser/userdown',array('id'=>$fuid)));

	}
	
	
	
	
	
	
	
	
	
	//用户下载增加
	public function dnwrite(){

		
		$dwuserdown = M('dwuserdown');

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     6145728 ;// 设置附件上传大小
		$upload->exts      =     array( 'jpg','gif', 'png', 'jpeg','pdf','txt','sql','rar');// 设置附件上传类型
		$upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName  = ''; // 可以保存原文件名
	    $upload->replace  = true; // 可以覆盖文件

		// 上传文件
		$info   =   $upload->upload();


		if($info){
			$data['cn_down'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_down'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_downname'] = $info[0]['name'];
		    $data['en_downname'] = $info[1]['name'];
		}

		$data['dwuserid'] = $_POST['dwuserid'];
		$data['cn_downname'] = $_POST['cn_downname'];
		$data['en_downname'] = $_POST['en_downname'];
		$data['o'] = $_POST['downsort'];
	    $dwuserdown->create($data);

		// 写入数据
		if($dwuserdown->add($data)){
			$this->success('恭喜，操作成功！',U('Dwuser/userdown',array('id'=>$data['dwuserid'])));
			exit;
		} else {
			$this->error('参数错误！');
		}
		$this -> display();
	}
}