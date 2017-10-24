<?php

namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class FelgproductController extends ComController {

	//FELG产品
	public function index(){
		                        $type = I('typeptname');
								//print_r($type);
		                        $key=I('kw');     //获取到标题的输入值
                                if($type == 1){
									$map['cn_ftname'] = array('like',"%".$key."%");     //赋值name=值 */
								}elseif($type == 2){
									$map['en_ftname'] = array('like',"%".$key."%");     //赋值name=值 */
								}
                                $this -> assign('type',$type);

                                $count= M('felgproduct')->where($map)->count();// 查询满足要求的总记录数
                                $Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
                                $show= $Page->show();// 分页显示输出

                                $result=D('felgproduct')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('ftsort')->select();

                                $this->assign('page',$show);
                                $this->assign('list',$result);

                                $this->assign('val',$key);


		//print_r($list);exit;

		$this -> display();
	}
	//新增FELG产品
	public function add(){
		//FELG产品频率
        $listhz = M('felghz')->order('fghzsort asc')->select();
		$this->assign('listhz',$listhz);
		

		//FELG产品类型
		$listtype = M('felgtype')->order('fgtypesort asc')->select();
		$this->assign('listtype',$listtype);
		/* print_r($listhz);exit; */
		$this -> display();
	}
	
	public function cnhzaddinfo(){
		$felgcnhz = $_POST['felgcnhz'];
		$cntype = M('felgtype')->where("cn_hzid = $felgcnhz")->order('fgtypesort asc')->select();
		$data['cntype'] = $cntype;
		echo json_encode($data);
	}
	
	public function enhzaddinfo(){
		$enfelgcnhz = $_POST['enfelgcnhz'];
	    $entype = M('felgtype')->where("en_hzid = $enfelgcnhz")->order('fgtypesort asc')->select();
		$data['entype'] = $entype;
		echo json_encode($data);
	}
	
	
	
	
	
	//新增或修改FELG产品
	public function edit($id=null){

		$id = intval($id);
		//FELG产品频率
        $listhz = M('felghz')->order('fghzsort asc')->select();
		$this->assign('listhz',$listhz);


		//FELG产品类型
		$listtype = M('felgtype')->order('fgtypesort asc')->select();
		$this->assign('listtype',$listtype);

		$link = M('felgproduct')->where('id='.$id)->find();
		$this->assign('link',$link);
		
		//中文频率
		$cnhzid = $link['cn_hzid'];
		$cnhznamearray = M('felghz')->where("id = $cnhzid")->select();
		$cnhzname = $enhznamearray[0]['cn_fghz'];
		$this->assign('cnhzname',$cnhzname);
			
		//英文频率
		$enhzid = $link['en_hzid'];
		$enhznamearray = M('felghz')->where("id = $enhzid")->select();
		$enhzname = $enhznamearray[0]['en_fghz'];
		$this->assign('enhzname',$enhzname);
		
		
		//中文类型
		$cntypeid = $link['cn_tid'];
		$cntypenamearray = M('felgtype')->where("id = $cntypeid")->select();
		$cntypename = $cntypenamearray[0]['cn_fgtypename'];
		$this->assign('cntypename',$cntypename);
		
		//英文类型
	    $entypeid = $link['en_tid'];
		$entypenamearray = M('felgtype')->where("id = $entypeid")->select();
		$entypename = $entypenamearray[0]['en_fgtypename'];
		$this->assign('entypename',$entypename);
		//print_r($entypename);exit;

		$this -> display();
	}
	//删除FELG产品
	public function del(){

		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('felgproduct')->where($map)->delete()){
				addlog('删除友情FELG产品，ID：'.$ids);
				$this->success('恭喜，删除成功！');
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}
	}
	//保存FELG产品
	public function update($id=0){
		$id = intval($id);


		//频率
		$data['cn_hzid'] = I('post.felgcnhz','','strip_tags');
		$data['en_hzid'] = I('post.enfelgcnhz','','strip_tags');
		
		//类型id
        $data['cn_tid'] = I('post.felgcntype','','strip_tags');
		$data['en_tid'] = I('post.enfelgcntype','','strip_tags');

		$hzcn = I('post.felgcnhz','','strip_tags');
		
		
	
		
	
		//产品名称
		$data['cn_ftname'] = I('post.cn_ftname','','strip_tags');
		$data['en_ftname'] = I('post.en_ftname','','strip_tags');

		//产品标题
		$data['cn_fttitle'] = I('post.cn_fttitle','','strip_tags');
		$data['en_fttitle'] = I('post.en_fttitle','','strip_tags');

		//产品规格
		$data['cn_ftspec'] = isset($_POST['cn_ftspec'])?$_POST['cn_ftspec']:false;
		$data['en_ftspec'] = isset($_POST['en_ftspec'])?$_POST['en_ftspec']:false;


		//产品图片
		$cnftimg = I('post.cn_ftimg','','strip_tags');
		$enftimg = I('post.en_ftimg','','strip_tags');

		if($cnftimg<>'') {
			$data['cn_ftimg'] = $cnftimg;
		}
		if($enftimg<>'') {
			$data['en_ftimg'] = $enftimg;
		}



		//是否推荐
		$data['cn_choose'] = I('post.cn_choose','','strip_tags');
		$data['en_choose'] = I('post.en_choose','','strip_tags');

		//推荐排序
		$data['cn_choosesort'] = I('post.cn_choosesort','','strip_tags');
		$data['en_choosesort'] = I('post.en_choosesort','','strip_tags');

		//排序
		$data['ftsort'] = I('post.ftsort','','strip_tags');

		//是否推荐搜索
		$data['search'] = I('post.search','','strip_tags');

		if($id){
			M('felgproduct')->data($data)->where('id='.$id)->save();
			addlog('修改FELG产品，ID：'.$id);
		}else{
			$a = M('felgproduct')->data($data)->add();

			addlog('新增FELG产品');
		}

		$this->success('恭喜，操作成功！',U('index'));
	}




	//产品匹配
	public function matching(){



		//获取产品匹配id
		$ids = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		//对产品匹配id进行赋值
		$this->assign('ids',$ids);

		$count= M('matching')->where("fuid = $ids")->count();// 查询满足要求的总记录数


		$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出

		$result=D('matching')->where("fuid = $ids")->limit($Page->firstRow.','.$Page->listRows)->order('mgsort')->select();

		$this->assign('page',$show);
		$this->assign('list',$result);

		$this->assign('val',$key);

		$this->display();

	}


	//产品匹配
	public function matchingadd(){

		$id = I('request.id');

		$this->assign('id',$id);
		$where = "id != $id";
		$listproduct = M('felgproduct')->where($where)->order('ftsort')->select();
		$this->assign('listproduct',$listproduct);

		$this ->display();

	}

	//新增产品匹配写入
	public function matchingupdate(){

		$matching = M('matching');
		$data['fuid'] = $_POST['fuid'];
		$data['cn_mgname'] = $_POST['cn_mgname'];
		$data['en_mgname'] = $_POST['en_mgname'];
		$data['mgsort'] = $_POST['mgsort'];
	    $matching->create($data);

		// 写入数据
		if($matching->add($data)){
			$this->success('恭喜，操作成功！',U('Felgproduct/matching',array('id'=>$data['fuid'])));
		} else {
			$this->error('参数错误！');
		}

	}



	//修改产品匹配修改显示
	public function matchingedit(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$fuid = M('matching')->where('id='.$id)->getField('fuid');

		$where = "id !=".$fuid;

		$felgproduct = M('felgproduct')->where($where)->order('ftsort')->select();

		$this->assign('felgproduct',$felgproduct);

		$matching = M('matching')->where('id='.$id)->find();
		$this->assign('matching',$matching);




		$this->display();

	}


	//产品匹配修改
	public function matchingxiugai(){
		$id = $_POST['id'];
		$fuid = M('matching')->where("id = $id")->getField('fuid');

		$matching = M("matching"); // 实例化User对象
		// 要修改的数据对象属性赋值

		$data['cn_mgname'] = $_POST['cn_mgname'];
		$data['en_mgname'] = $_POST['en_mgname'];
		$data['mgsort'] = $_POST['mgsort'];
		$matching->where("id = $id")->save($data); // 根据条件更新记录
		$this->success('恭喜，操作成功！',U('Felgproduct/matching',array('id'=>$fuid)));

	}


	//产品匹配删除
	public function matchingdel(){
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		$matching = M("matching");
		$fuid = $matching->where('id ='.$ids)->getField('fuid');

	    if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('matching')->where($map)->delete()){
				addlog('删除产品匹配，ID：'.$ids);
				$this->success('恭喜，删除成功！',U('Felgproduct/matching',array('id'=>$fuid)),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}

	}





	//产品下载显示
	public function felgDown(){
		//产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		//把产品id 赋值给新增
		$this -> assign('id',$id);

		$where = "felgptid = $id";
		   $felgptdown = M('felgptdown');
		$list = $felgptdown->where($where)->order('downsort')->select();

		$this -> assign('list',$list);



		$this -> display();
	}

	//产品下载添加
	public function felgDownadd(){

		//赋值产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);




		//print_r($id);exit;

		$this -> display();
	}

	//产品下载写入
	public function felgptdnwrite(){
		$felgptdown = M('felgptdown');



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
			$data['cn_felgdownname'] = $info[0]['name'];
		    $data['en_felgdownname'] = $info[1]['name'];
		}

		$data['felgptid'] = $_POST['felgptid'];
		$data['cn_downname'] = $_POST['cn_downname'];
		$data['en_downname'] = $_POST['en_downname'];
		$data['downsort'] = $_POST['downsort'];
	    $felgptdown->create($data);

		// 写入数据
		if($felgptdown->add($data)){
			$this->success('恭喜，操作成功！',U('Felgproduct/felgDown',array('id'=>$data['felgptid'])));
		} else {
			$this->error('参数错误！');
		}


	}



	//产品下载修改显示
	public function felgdownedit(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);

		$felgptdown = M('felgptdown');
		$where = "id = $id";
		$fgdown = $felgptdown->where($where)->find();


		$this -> assign('fgdown',$fgdown);
		$this -> display();
	}


	//产品下载修改
	public function downedit(){

		$id = $_POST['id'];

		$felgptdown = M('felgptdown');

		$fuid = $felgptdown->where("id = $id")->getField('felgptid');


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
			$data['cn_felgdownname'] = $info[0]['name'];
		    $data['en_felgdownname'] = $info[1]['name'];
		}

		$data['cn_downname'] = $_POST['cn_downname'];
		$data['en_downname'] = $_POST['en_downname'];
		$data['downsort'] = $_POST['downsort'];

		M('felgptdown')->data($data)->where('id='.$id)->save();
		//$felgptdown->where("id = $id")->save($data); // 根据条件更新记录
		$this->success('恭喜，操作成功！',U('Felgproduct/felgDown',array('id'=>$fuid)));

	}



	//产品下载删除
	public function felgptdndel(){
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		$felgptdown = M("felgptdown");
		$felgptid = $felgptdown->where('id ='.$ids)->getField('felgptid');

	    if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('felgptdown')->where($map)->delete()){
				addlog('删除产品匹配，ID：'.$ids);
				$this->success('恭喜，删除成功！',U('Felgproduct/felgDown',array('id'=>$felgptid)),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}

	}





	//felg产品密码下载列表
	public function felgMmDown(){

		//产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		//把产品id 赋值给新增
		$this -> assign('id',$id);

		$where = "felgptid = $id";
		   $felgptdown = M('felgptmmdown');
		$list = $felgptdown->where($where)->order('mmdownsort')->select();

		$this -> assign('list',$list);



        //显示页面
        $this -> display();

	}


	//felg产品密码下载添加
	public function felgMmDownadd(){

        //赋值产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);


		//显示页面
		$this -> display();
	}


	//产品下载写入
	public function felgptmmdnwrite(){

		$felgptdown = M('felgptmmdown');

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     6145728 ;// 设置附件上传大小
		$upload->exts      =     array( 'jpg','gif', 'png', 'jpeg','pdf','txt','sql','rar');// 设置附件上传类型
		$upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName  = ''; // 可以保存原文件名
	    $upload->replace  = true; // 可以覆盖文件

		// 上传文件
		$info =  $upload->upload();

		if($info){
			$data['cn_mmdown'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_mmdown'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_felgmmdownname'] = $info[0]['name'];
		    $data['en_felgmmdownname'] = $info[1]['name'];
		}

		$data['felgptid'] = $_POST['felgptid'];
		$data['cn_mmdownname'] = $_POST['cn_mmdownname'];
		$data['en_mmdownname'] = $_POST['en_mmdownname'];
		$data['mmdownsort'] = $_POST['mmdownsort'];
	    $felgptdown->create($data);

        //根据felg产品id查找出对应的频率和类型名称
        $ptid = $_POST['felgptid'];
        $felgpt = M("felgproduct");
        $felgptHzTtypeFind = "felgcnhzname,felgenhzname,felgcntypename,felgentypename";
        $HzType = $felgpt->where("id = $ptid")->getField($felgptHzTtypeFind);


        $data['cn_felghzname'] = $HzType[0]['felgcnhzname'];
        $data['en_felghzname'] = $HzType[0]['felgenhzname'];
        $data['cn_felgtypename'] = $HzType[0]['felgcntypename'];
        $data['en_felgtypename'] = $HzType[0]['felgentypename'];



		// 写入数据
		if($felgptdown->add($data)){
			$this->success('恭喜，操作成功！',U('Felgproduct/felgMmDown',array('id'=>$data['felgptid'])));
		} else {
			$this->error('参数错误！');
		}
	}


   //产品密码下载删除
	public function felgptmmdndel(){
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		$felgptdown = M("felgptmmdown");
		$felgptid = $felgptdown->where('id ='.$ids)->getField('felgptid');
		//print_r($fuid);exit;
	    if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('felgptmmdown')->where($map)->delete()){
				addlog('删除产品匹配，ID：'.$ids);
				$this->success('恭喜，删除成功！',U('Felgproduct/felgMmDown',array('id'=>$felgptid)),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}

	}




	//产品密码下载修改显示
	public function felgmmdownedit(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);

		$felgptdown = M('felgptmmdown');
		$where = "id = $id";
		$fgdown = $felgptdown->where($where)->find();
		//print_r($fgdown);exit;

		$this -> assign('fgdown',$fgdown);
		$this -> display();
	}



    //产品密码下载修改
	public function downmmedit(){

		$id = $_POST['id'];
		//print_r($id);exit;
		$felgptdown = M('felgptmmdown');

		$fuid = $felgptdown->where("id = $id")->getField('felgptid');
		//print_r($fuid);exit;

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
			$data['cn_mmdown'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_mmdown'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_felgmmdownname'] = $info[0]['name'];
		    $data['en_felgmmdownname'] = $info[1]['name'];
		}

		$data['cn_mmdownname'] = $_POST['cn_downname'];
		$data['en_mmdownname'] = $_POST['en_downname'];
		$data['mmdownsort'] = $_POST['downsort'];

		M('felgptmmdown')->data($data)->where('id='.$id)->save();
		//$felgptdown->where("id = $id")->save($data); // 根据条件更新记录
		$this->success('恭喜，操作成功！',U('Felgproduct/felgMmDown',array('id'=>$fuid)));

	}
}

