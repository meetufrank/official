<?php
namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class MessageController extends ComController {
	
	//友情链接
	public function index(){
	
		                        $key=I('kw');     //获取到标题的输入值

                                $map['mname'] = array('like',"%".$key."%");     //赋值name=值 */

                                $count= M('message')->where($map)->count();// 查询满足要求的总记录数
                                $Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
                                $show= $Page->show();// 分页显示输出

                                $result=D('message')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('mtime asc')->select();
							
                                $this->assign('page',$show);
                                $this->assign('list',$result);
						
                                $this->assign('val',$key);



		                        $this -> display();
		                          
	}
	//新增链接
	public function add(){

		$this -> display();
	}
	//新增或修改链接
	public function edit($id=null){
		
		$id = intval($id);
		$link = M('message')->where('id='.$id)->find();
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
			if(M('message')->where($map)->delete()){
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
			M('flashview')->data($data)->where('id='.$id)->save();
			addlog('修改友情链接，ID：'.$id);
		}else{
			M('flashview')->data($data)->add();
			addlog('新增友情链接');
		}
		
		$this->success('恭喜，操作成功！',U('index'));
	}
}