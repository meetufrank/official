<?php


namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;
use Think\Auth;
class IndustryController extends ComController{
	
	//行业
	public function index(){
	
		
		$count= M('industry')->where($map)->count();// 查询满足要求的总记录数
	
	
		$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出

		$result=D('industry')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('iysort asc')->select();
													
		$this->assign('page',$show);
		$this->assign('list',$result);
												
		$this->assign('val',$key);

       
                                
		$this -> display();
		                          
	}
	//新增行业
	public function add(){

		$this -> display();
	}
	//新增或修改行业
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('industry')->where('id='.$id)->find();
		$this->assign('link',$link);
		$this -> display();
	}
	
	
	//删除行业
	public function del(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			//print_r($ids);exit;
			
			
			if(M('industry')->where($map)->delete()){
				
				addlog('删除首页轮播图，ID：'.$ids);
				//删除对应的行业类别轮播图
				$User = M("industryimgs");
				$User->where('iyid='.$ids)->delete();
				$this->success('恭喜，删除成功！,对应的行业类别轮播图也已删除。',U('Industry/index'),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存行业
	public function update($id=0){
		$id = intval($id);
		
		//行业名称
		$data['cn_nameiy'] = I('post.cn_nameiy','','strip_tags');
		$data['en_nameiy'] = I('post.en_nameiy','','strip_tags');
		
		
		//行业图片
		$cnimgiy = I('post.cn_imgiy','','strip_tags');
		$enimgiy = I('post.en_imgiy','','strip_tags');
		
		
		//行业好友logo
		$cniylogo = I('post.cn_iylogo','','strip_tags');
		$eniylogo = I('post.en_iylogo','','strip_tags');
		
		//行业链接
	    $data['cn_linksiy'] = I('post.cn_linksiy','','strip_tags');
		$data['en_linksiy'] = I('post.en_linksiy','','strip_tags');
		
		//行业缩略图是否开启
		$data['cn_iyshowimg'] = I('post.cn_iyshowimg','','strip_tags');
		$data['en_iyshowimg'] = I('post.en_iyshowimg','','strip_tags');
		
		//行业介绍
	    $data['cn_iycontent'] = I('post.cn_iycontent');
		$data['en_iycontent'] = I('post.en_iycontent');
	
/* 		print_r(I('post.cn_iycontent'));
		print_r(I('post.en_iycontent'));
		exit; */
		$data['tips'] = I('post.tips');
	    //行业排序
        $data['iysort'] = I('post.iysort','','strip_tags');		

        //中文行业图片
		if($cnimgiy<>'') {
			$data['cn_imgiy'] = $cnimgiy;
		}
		//英文行业图片
		if($enimgiy<>'') {
			$data['en_imgiy'] = $enimgiy;
		}
		
	    //中文行业好友logo
		if($cniylogo<>'') {
			$data['cn_iylogo'] = $cniylogo;
		}
		//英文行业好友logo
		if($eniylogo<>'') {
			$data['en_iylogo'] = $eniylogo;
		}
		
		
		
		//行业好友公司logo是否显示
		$data['cn_logoshow'] = I('post.cn_logoshow');
		$data['en_logoshow'] = I('post.en_logoshow');
		
/* 		print_r($data['cn_iyshowimg']);
		print_r($data['en_iyshowimg']);
		exit; */
		
		//行业经典案例名称
		$data['cn_anliname1'] = I('post.cn_anliname1');
		$data['cn_anliname2'] = I('post.cn_anliname2');
		$data['cn_anliname3'] = I('post.cn_anliname3');
		
		$data['en_anliname1'] = I('post.en_anliname1');
		$data['en_anliname2'] = I('post.en_anliname2');
		$data['en_anliname3'] = I('post.en_anliname3');
		
		//行业经典案例图片
		//中文
		$cn_anli1 = I('post.cn_anli1','','strip_tags');
		$cn_anli2 = I('post.cn_anli2','','strip_tags');
		$cn_anli3 = I('post.cn_anli3','','strip_tags');

		if($cn_anli1<>'') {
			$data['cn_anli1'] = $cn_anli1;
		}
		if($cn_anli2<>'') {
			$data['cn_anli2'] = $cn_anli2;
		}
		if($cn_anli3<>'') {
			$data['cn_anli3'] = $cn_anli3;
		}
		
		
		
		
		//英文
		$en_anli1 = I('post.en_anli1','','strip_tags');
        $en_anli2 = I('post.en_anli2','','strip_tags');
		$en_anli3 = I('post.en_anli3','','strip_tags');
		if($en_anli1<>'') {
			$data['en_anli1'] = $en_anli1;
		}
		if($en_anli2<>'') {
			$data['en_anli2'] = $en_anli2;
		}
		if($en_anli3<>'') {
			$data['en_anli3'] = $en_anli3;
		}
		
		
		//经典案例是否开启
		//中文
		$data['cn_anli1show'] = I('post.cn_anli1show','','strip_tags');	
		$data['cn_anli2show'] = I('post.cn_anli2show','','strip_tags');	
		$data['cn_anli3show'] = I('post.cn_anli3show','','strip_tags');	
		
		
		//英文
		$data['en_anli1show'] = I('post.en_anli1show','','strip_tags');	
		$data['en_anli2show'] = I('post.en_anli2show','','strip_tags');	
		$data['en_anli3show'] = I('post.en_anli3show','','strip_tags');	
		
		if($id){
			M('industry')->data($data)->where('id='.$id)->save();
			addlog('修改行业，ID：'.$id);
		}else{
			M('industry')->data($data)->add();
			addlog('新增行业');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
	
	
	
	//行业轮播图片
	public function industryimgs(){
		$id = I('request.id');
		$this->assign('id',$id);
		/* print_r($id);exit; */
		
		$count= M('industryimgs')->where("iyid = $id")->count();// 查询满足要求的总记录数
	
	
		$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出

		$result=D('industryimgs')->where("iyid = $id")->limit($Page->firstRow.','.$Page->listRows)->order('iyimgssort asc')->select();
													
		$this->assign('page',$show);
		$this->assign('list',$result);
												
		$this->assign('val',$key);
		
		/* print_r($result);exit; */
		$this->display();
	}
	
	//行业轮播图片新增
	public function industryimgsadd(){
		
		$id = I('request.id');
		
		
		$link = M('industry')->where('id='.$id)->find();
		/* print_r($link);exit; */
		$this->assign('link',$link);
		
		$this ->display();
		
	}
	
	//行业轮播图修改
	public function industryimgsedit($id=null){
		$id = I('request.id');
		
		$iyid = M('industryimgs')->where('id='.$id)->getField('iyid');
		/* print_r($iyid);exit; */
		
		$linkfu = M('industry')->where('id='.$iyid)->find();
		$this->assign('linkfu',$linkfu);
		//print_r($linkfu);exit;
		
		$link = M('industryimgs')->where('id='.$id)->find();
		$this->assign('link',$link);
		
		$this -> display();
	}
	
	
	//行业轮播图片保存
	public function iyupdate($id=0){
		$id = I('post.id');  //行业类别轮播图id
		$iyid = I('post.iyid');    //行业类别id
	/* print_r($id);
	print_r($iyid);
	exit; */
		//行业轮播图
		$cniyimgs = I('post.cn_iyimgs','','strip_tags');
		$eniyimgs = I('post.en_iyimgs','','strip_tags');
		
		//行业轮播图片
		if($cniyimgs<>'') {
			$data['cn_iyimgs'] = $cniyimgs;
		}	
		if($eniyimgs<>'') {
			$data['en_iyimgs'] = $eniyimgs;
		}
		
		//排序
		$data['iyimgssort'] = I('post.iyimgssort','','strip_tags');
		
		
		//行业id
		$data['iyid'] = I('post.iyid','','strip_tags');
		 
		if($id){
			/* print_r($id);exit; */
			M('industryimgs')->data($data)->where('id='.$id)->save();
			addlog('修改行业轮播图，ID：'.$id);
		}else{
			M('industryimgs')->data($data)->add();
			addlog('新增行业轮播图');
		}
		
		 //$this->success('恭喜，操作成功！',U('Industry/industryimgs'),3);
		 $this->success('恭喜，操作成功！',U('Industry/industryimgs',array('id'=>$data['iyid'])));
			
	}
	
	
	
	//删除行业轮播图
	public function deliy(){
		
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
        $User = M("industryimgs");
		$iyid = $User->where('id ='.$ids)->getField('iyid');
		/* print_r($iyid);exit; */
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('industryimgs')->where($map)->delete()){
				addlog('删除行业轮播图，ID：'.$ids);
				$this->success('恭喜，删除成功！',U('Industry/industryimgs',array('id'=>$iyid)),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	
	
}