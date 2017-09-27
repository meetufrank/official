<?php
namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class ProductlistimgsController extends ComController {
	
	//友情链接
	public function index(){
	
		$User = M('productlistimgs'); // 实例化User对象
		$count      = $User->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->order('fwsort asc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		
		
		$this->display(); // 输出模板
		                          
	}
	//新增链接
	public function add(){

		$this -> display();
	}
	//新增或修改链接
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('productlistimgs')->where('id='.$id)->find();
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
			if(M('productlistimgs')->where($map)->delete()){
				addlog('删除首页轮播图，ID：'.$ids);
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
		//中文版
		//中文轮播图电脑
		$cnflashviewpc = I('post.cn_flashviewpc','','strip_tags');
		//中文轮播图电脑是否开启
		$data['cn_fwshowpc'] = I('post.cn_fwshowpc','','strip_tags');
		//中文轮播图手机
		$cnflashviewphone = I('post.cn_flashviewphone','','strip_tags');
		//中文轮播图手机是否开启
		$data['cn_fwshowphone'] = I('post.cn_fwshowphone','','strip_tags');
		
	
		//英文版
		//英文轮播图电脑
		$enflashviewpc = I('post.en_flashviewpc','','strip_tags');
		//英文轮播图电脑是否开启
		$data['en_fwshowpc'] = I('post.en_fwshowpc','','strip_tags');
		//英文轮播图手机
		$enflashviewphone = I('post.en_flashviewphone','','strip_tags');
		//英文轮播图手机是否开启
		$data['en_fwshowphone'] = I('post.en_fwshowphone','','strip_tags');
		
        //中文链接
		$data['cn_fwlink'] = I('post.cn_fwlink','','strip_tags');	
		
		//英文链接
		$data['en_fwlink'] = I('post.en_fwlink','','strip_tags');	
	    //排序
        $data['fwsort'] = I('post.fwsort','','strip_tags');		

        //中文轮播图电脑
		if($cnflashviewpc<>'') {
			$data['cn_flashviewpc'] = $cnflashviewpc;
		}
		//中文轮播图手机
		if($cnflashviewphone<>'') {
			$data['cn_flashviewphone'] = $cnflashviewphone;
		}
		
		
		if($enflashviewpc<>'') {
			$data['en_flashviewpc'] = $enflashviewpc;
		}
		if($enflashviewphone<>'') {
			$data['en_flashviewphone'] = $enflashviewphone;
		}
		
		
		
		if($id){
			M('productlistimgs')->data($data)->where('id='.$id)->save();
			addlog('修改友情链接，ID：'.$id);
		}else{
			M('productlistimgs')->data($data)->add();
			addlog('新增友情链接');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}