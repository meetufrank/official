<?php
/**
  支持下载功能
**/

namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;
use Think\Controller;
class SupportController extends ComController {

	//友情链接
	public function index(){

		$list = M('support')->order('stsort')->select();
		$this->assign('list',$list);



		//获取当前下载验证码
		$dates = date('md');
        $codeyzm = $dates + 1234;
		//print_r($codeyzm);exit;
		$this->assign('codeyzm',$codeyzm);

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
		$link = M('support')->where('id='.$id)->find();
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
			if(M('support')->where($map)->delete()){
				addlog('删除支持，ID：'.$ids);
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


	$upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     314572800 ;// 设置附件上传大小
    $upload->exts      =     array('gif', 'png', 'jpeg','pdf','txt','sql','rar','zip');// 设置附件上传类型
    $upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
    $upload->savePath  = ''; // 设置附件上传（子）目录
	$upload->saveName  = ''; // 可以保存原文件名
	$upload->replace  = true; // 可以覆盖文件
    // 上传文件
    $info   =   $upload->upload();
	  //print_r($info);exit;
	// 上传错误提示错误信息
    /* if(!$info) {
        $this->error($upload->getError());
    } */

	//else{// 上传成功
    if($info){
	        $data['cn_file'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_file'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_downname'] = $info[0]['name'];
		    $data['en_downname'] = $info[1]['name'];

    }

	 //print_r($data['en_file']);exit;
		$data['cn_sttype'] = I('post.cn_sttype','','strip_tags');
		$data['cn_stname'] = I('post.cn_stname','','strip_tags');
		$data['cn_sttitle'] = I('post.cn_sttitle','','strip_tags');

		$data['en_sttype'] = I('post.en_sttype','','strip_tags');
		$data['en_stname'] = I('post.en_stname','','strip_tags');
		$data['en_sttitle'] = I('post.en_sttitle','','strip_tags');



		if($id){
			M('support')->data($data)->where('id='.$id)->save();
			addlog('修改友情链接，ID：'.$id);
		}else{
			M('support')->data($data)->add();
			addlog('新增友情链接');
		}

		$this->success('恭喜，操作成功！',U('index'));
	}
}