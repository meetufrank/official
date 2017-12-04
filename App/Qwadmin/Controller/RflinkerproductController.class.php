<?php

namespace Qwadmin\Controller;
use Qwadmin\Controller\ComController;

class RflinkerproductController extends ComController {

	//Rflinkerproduct产品
	public function index(){




	 //语言id
		$langname = isset($_GET['langname'])?$_GET['langname']:0;
		//频率id
		$hz = isset($_GET['hz'])?$_GET['hz']:0;
		//类型id
		$type = isset($_GET['type'])?$_GET['type']:0;
		
	
		if($langname == ''){
			$where = "";
		}elseif($langname == 1){
			$where = "cn_hzid = $hz and cn_tid = $type";
			//中文类型
			$hzselect= M('rflinkerhz')->where("cn_rflinkerhz is not null")->field("id,cn_rflinkerhz as fghz")->select();
			$this->assign('hzselect',$hzselect);
			
			//中文频率
			$typeselect = M('rflinkertype')->where("cn_hzid = $hz")->field("id,cn_rflinkertypename as fgtypename")->select();
			$this->assign('typeselect',$typeselect);
			
			
		}elseif($langname == 2){
			//英文类型  
			$hzselect= M('rflinkerhz')->where("en_rflinkerhz is not null")->field("id,en_rflinkerhz as fghz")->select();
			$this->assign('hzselect',$hzselect);
			
			//英文频率
			$typeselect = M('rflinkertype')->where("en_hzid = $hz")->field("id,en_rflinkertypename as fgtypename")->select();
			$this->assign('typeselect',$typeselect);

			$where = "en_hzid = $hz and en_tid = $type";
		}
		
		    $count= M('rflinkerproduct')->where($where)->count();// 查询满足要求的总记录数
            $Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$show= $Page->show();// 分页显示输出

			$result=D('rflinkerproduct')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('rrsort')->select();

			$this->assign('page',$show);
			$this->assign('list',$result);
			
			$this->assign('langname',$langname);
			$this->assign('typeselect',$typeselect);
			$this->assign('type',$type);
			$this->assign('hz',$hz);
			$this -> display();
	
	
	}
	
	//根据语言来查询出第一个频率和类型
	public function langselect(){
		//中英文语言
		$langname = $_POST["langname"];
		
		//根据中英文语言查询出该区域的所有频率和类型第一个
		if($langname == 0){
			
			$data['qxz'] = "qxz";
			echo json_encode($data);
		
		}elseif($langname == 1){
			//中文
			//频率
			$listhz = M('rflinkerhz')->order('rrsort asc')->field("id,cn_rflinkerhz as hzname")->select();
			
			$listhzyi = M('rflinkerhz')->order('rrsort asc')->field("id,cn_rflinkerhz as hzname")->limit(1)->find();
			$cn_hzid = $listhzyi['id'];
			
			$listtype = M('rflinkertype')->where("cn_hzid = $cn_hzid")->order('rrtypesort asc')->field("id,cn_rflinkertypename as typename")->select();
			$data['hz'] = $listhz;
			$data['type'] = $listtype;
			echo json_encode($data);
			
			
		}elseif($langname == 2){
			//英文
			//频率
			$listhz = M('rflinkerhz')->order('rrsort asc')->field("id,en_rflinkerhz as hzname")->select();	

            $listhzyi = M('rflinkerhz')->order('rrsort asc')->field("id,en_rflinkerhz as hzname")->limit(1)->find();
			$en_hzid = $listhzyi['id'];
			
			$listtype = M('rflinkertype')->where("en_hzid = $en_hzid")->order('rrtypesort asc')->field("id,en_rflinkertypename as typename")->select();			
			$data['hz'] = $listhz;
			$data['type'] = $listtype;
			echo json_encode($data);			
			
		}
	
	}
	
	//根据频率查询出所属类型
	public function hzselect(){
		//中英文语言
		$langname = $_POST["langname"];
		//频率id
		$hzid = $_POST["hzid"];
		
		
		//根据中英文语言查询出该区域的所有类型
		if($langname == 1){
			//中文
			//类型
			$listtype = M('rflinkertype')->order('rrtypesort asc')->where("cn_hzid = $hzid")->field("id,cn_rflinkertypename as typename")->select();
			$data['type'] = $listtype;
			echo json_encode($data);
			
			
		}elseif($langname == 2){
			//英文
			//类型		
			$listtype = M('rflinkertype')->order('rrtypesort asc')->where("en_hzid = $hzid")->field("id,en_rflinkertypename as typename")->select();						
			$data['hz'] = $listhz;
			$data['type'] = $listtype;
			echo json_encode($data);			
			
		}
	
	}
	
	
	//新增Rflinkerproduct产品
	public function add(){
		//Rflinkerproduct产品频率
        $listhz = M('rflinkerhz')->order('rrsort asc')->select();
		$this->assign('listhz',$listhz);

		//print_r($listhz);exit;

		//Rflinkerproduct产品类型
		$listtype = M('rflinkertype')->order('rrtypesort asc')->select();
		$this->assign('listtype',$listtype);
		//print_r($listtype);exit;
		$this -> display();
	}
	
	
	public function cnhzaddinfo(){
		$rflinkercnhz = $_POST['felgcnhz'];
		
	    $entype = M('rflinkertype')->where("cn_hzid = $rflinkercnhz")->order('rrtypesort asc')->select();
		$data['cntype'] = $entype;
		echo json_encode($data);

	}
	
	
	public function enhzaddinfo(){
		$rflinkerenhz = $_POST['enfelgcnhz'];
		
	    $entype = M('rflinkertype')->where("en_hzid = $rflinkerenhz")->order('rrtypesort asc')->select();
		$data['entype'] = $entype;
		echo json_encode($data);
	}
	
	
	
	
	
	//新增或修改RFLINKER产品
	public function edit($id=null){

		$id = intval($id);
		//FELG产品频率
        $listhz = M('rflinkerhz')->order('rrsort asc')->select();
		$this->assign('listhz',$listhz);
		
		
		$link = M('rflinkerproduct')->where('id='.$id)->find();
		$this->assign('link',$link);
		
		
		
		//英文频率
		$enhzid = $link['en_hzid'];
		$enhznamearray = M('rflinkerhz')->where("id = $enhzid")->select();
	
		$enhzname = $enhznamearray[0]['en_rflinkerhz'];
			
		$this->assign('enhzname',$enhzname);

        //英文类型
		//1.根据频率名称查找出对应的类型
		$pyidarray = M('rflinkerhz')->where("en_rflinkerhz = '$enhzname'")->find();
		$pyid = $pyidarray['id'];
		
		//英文FELG产品类型
		$listtype = M('rflinkertype')->where("en_hzid = $pyid")->order('rrtypesort asc')->select();
		$this->assign('listtype',$listtype);
		
		//print_r($listtype);exit;

		
		
		//中文频率
		$cnhzid = $link['cn_hzid'];
		$cnhznamearray = M('rflinkerhz')->where("id = $cnhzid")->select();
		$cnhzname = $enhznamearray[0]['cn_rflinkerhz'];
		$this->assign('cnhzname',$cnhzname);
			
		
		
		
		//中文类型
		$cntypeid = $link['cn_tid'];
		$cntypenamearray = M('rflinkertype')->where("id = $cntypeid")->select();
		$cntypename = $cntypenamearray[0]['cn_rflinkertypename'];
		$this->assign('cntypename',$cntypename);
		
	
		
		
	    $entypeid = $link['en_tid'];
		$entypenamearray = M('rflinkertype')->where("id = $entypeid")->select();
		$entypename = $entypenamearray[0]['en_rflinkertypename'];
		$this->assign('entypename',$entypename);
		//print_r($entypename);exit;
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
			if(M('rflinkerproduct')->where($map)->delete()){
				addlog('删除友情Rflinker产品，ID：'.$ids);
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
		$data['cn_hzid'] = I('post.rflinkercnhz','','strip_tags');
		$data['en_hzid'] = I('post.rflinkerenhz','strip_tags');
		
		//类型id
        $data['cn_tid'] = I('post.rflinkercntype','','strip_tags');
		$data['en_tid'] = I('post.enfelgentype','','strip_tags');
		
		
		//频率
		$data['rflinkercnhzname'] = I('post.rflinkercnhzname','','strip_tags');
		$data['rflinkerenhzname'] = I('post.rflinkerenhzname','','strip_tags');



		//类型
		$data['rflinkercntypename'] = I('post.rflinkercntypename','','strip_tags');
		$data['rflinkerentypename'] = I('post.rflinkerentypename','','strip_tags');

		//产品名称
		$data['cn_rrname'] = I('post.cn_rrname','','strip_tags');
		$data['en_rrname'] = I('post.en_rrname','','strip_tags');

		//产品标题
		$data['cn_rrtitle'] = I('post.cn_rrtitle','','strip_tags');
		$data['en_rrtitle'] = I('post.en_rrtitle','','strip_tags');

		//搜索是否推荐
		$data['search'] = I('post.search','','strip_tags');


		//产品规格
		$data['cn_rrspec'] = isset($_POST['cn_rrspec'])?$_POST['cn_rrspec']:false;
		$data['en_rrspec'] = isset($_POST['en_rrspec'])?$_POST['en_rrspec']:false;

		//产品图片
		$cn_rrimg = I('post.cn_rrimg','','strip_tags');
		$en_rrimg = I('post.en_rrimg','','strip_tags');

		if($cn_rrimg<>'') {
			$data['cn_rrimg'] = $cn_rrimg;
		}
		if($en_rrimg<>'') {
			$data['en_rrimg'] = $en_rrimg;
		}



		//是否推荐
		$data['cn_rrchoose'] = I('post.cn_rrchoose','','strip_tags');
		$data['en_rrchoose'] = I('post.en_rrchoose','','strip_tags');

		//推荐排序
		$data['cn_rrchoosesort'] = I('post.cn_rrchoosesort','','strip_tags');
		$data['en_rrchoosesort'] = I('post.en_rrchoosesort','','strip_tags');

		//排序
		$data['rrsort'] = I('post.rrsort','','strip_tags');



		if($id){
			M('rflinkerproduct')->data($data)->where('id='.$id)->save();
			addlog('修改Rfinker产品，ID：'.$id);
		}else{
			M('rflinkerproduct')->data($data)->add();
			addlog('新增Rfinker产品');
		}

		$this->success('恭喜，操作成功！',U('index'));
	}




	//匹配产品
	public function rrmatching(){
		//产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);
		$count= M('rflinkermatching')->where("rflinkerid = $id")->count();// 查询满足要求的总记录数


		$Page= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出

		$result=D('rflinkermatching')->where("rflinkerid = $id")->limit($Page->firstRow.','.$Page->listRows)->order('rrsort')->select();

		$this->assign('page',$show);
		$this->assign('list',$result);

		$this->assign('val',$key);

		//print_r($result);exit;
		$this -> display();
	}

	//匹配产品新增显示
	public function rrmatchingadd(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		//print_r($id);exit;
		$this->assign('id',$id);

		$where = "id != $id";
		$listproduct = M('rflinkerproduct')->where($where)->order('rrsort')->select();
		$this->assign('listproduct',$listproduct);


		$this -> display();
	}


	//新增产品匹配写入
	public function rrmatchingupdate(){

		$rflinkermatching = M('rflinkermatching');
		$data['rflinkerid'] = $_POST['fuid'];
		$data['cn_rrname'] = $_POST['cn_rrname'];
		$data['en_rrname'] = $_POST['en_rrname'];
		$data['rrsort'] = $_POST['rrsort'];
	    $rflinkermatching->create($data);

		// 写入数据
		if($rflinkermatching->add($data)){
			$this->success('恭喜，操作成功！',U('Rflinkerproduct/rrmatching',array('id'=>$data['rflinkerid'])));
		} else {
			$this->error('参数错误！');
		}

	}

	//修改产品匹配修改显示
	public function rrmatchingedit(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$fuid = M('rflinkermatching')->where('id='.$id)->getField('rflinkerid');
		//print_r($fuid);exit;
		$where = "id !=".$fuid;

		$rflinkerproduct = M('rflinkerproduct')->where($where)->order('rrsort')->select();
		//print_r($rflinkerproduct);exit;
		$this->assign('rflinkerproduct',$rflinkerproduct);

		$rflinkermatching = M('rflinkermatching')->where('id='.$id)->find();
		$this->assign('rflinkermatching',$rflinkermatching);
		//print_r($rflinkermatching);exit;



		$this->display();

	}


	//产品匹配修改
	public function rrmatchingxiugai(){
		$id = $_POST['id'];
		//print_r($id);exit;
		$fuid = M('rflinkermatching')->where("id = $id")->getField('rflinkerid');
		//print_r($fuid);exit;
	    $rflinkermatching = M("rflinkermatching"); // 实例化User对象
		// 要修改的数据对象属性赋值

		$data['cn_rrname'] = $_POST['cn_rrname'];
		$data['en_rrname'] = $_POST['en_rrname'];
		$data['rrsort'] = $_POST['rrsort'];
		$rflinkermatching->where("id = $id")->save($data); // 根据条件更新记录
		$this->success('恭喜，操作成功！',U('Rflinkerproduct/rrmatching',array('id'=>$fuid)));

	}



	//产品匹配删除
	public function rrmatchingdel(){
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		$rflinkermatching = M("rflinkermatching");
		$fuid = $rflinkermatching->where('id ='.$ids)->getField('rflinkerid');
		//print_r($fuid);exit;
	    if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('rflinkermatching')->where($map)->delete()){
				addlog('删除产品匹配，ID：'.$ids);
				$this->success('恭喜，删除成功！',U('Rflinkerproduct/rrmatching',array('id'=>$fuid)),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}

	}

















	//产品下载显示
	public function rrfelgDown(){
		//产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;

		//print_r($id);exit;
		//把产品id 赋值给新增
		$this -> assign('id',$id);


		$where = "rrfuid = $id";
		$rfinkerdown = M('rfinkerdown');
		$list = $rfinkerdown->where($where)->order('downsort')->select();

		$this -> assign('list',$list);


		$this -> display();
	}


	//产品下载添加
	public function rrfelgDownadd(){

		//赋值产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);

		//print_r($id);exit;

		$this -> display();
	}


	//产品下载写入
	public function rrfelgptdnwrite(){

		$rfinkerdowns = M('rfinkerdown');

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg','gif', 'png', 'jpeg','pdf','txt','sql','rar');// 设置附件上传类型
		$upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName  = ''; // 可以保存原文件名
	    $upload->replace  = true; // 可以覆盖文件

		// 上传文件
		$info   =   $upload->upload();

		if($info){
			$data['cn_down'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_down'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_rrdownname'] = $info[0]['name'];
			$data['en_rrdownname'] = $info[1]['name'];
		}

		$data['rrfuid'] = $_POST['rrfuid'];
		$data['cn_downname'] = $_POST['cn_downname'];
		$data['en_downname'] = $_POST['en_downname'];
		$data['downsort'] = $_POST['downsort'];

	    $result=$rfinkerdowns->create($data);

		// 写入数据
		if($rfinkerdowns->add($data)){

			$this->success('恭喜，操作成功！',U('Rflinkerproduct/rrfelgDown',array('id'=>$data['rrfuid'])));
		}else {
			$this->error('参数错误！');
		}
	}




	//产品下载修改显示
	public function rrdownedit(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);

		$rfinkerdown = M('rfinkerdown');
		$where = "id = $id";
		$fgdown = $rfinkerdown->where($where)->find();
		//print_r($fgdown);exit;

		$this -> assign('fgdown',$fgdown);
		$this -> display();
	}


	//产品下载修改
	public function rrdownxiugai(){

		$id = $_POST['id'];
		//print_r($id);exit;
		$rfinkerdown = M('rfinkerdown');

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     6145728 ;// 设置附件上传大小
		$upload->exts      =     array('gif', 'png', 'jpeg','pdf','txt','sql','rar');// 设置附件上传类型
		$upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName  = ''; // 可以保存原文件名
	    $upload->replace  = true; // 可以覆盖文件
		// 上传文件
		$info   =   $upload->upload();


		if($info){
		    $data['cn_down'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_down'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_rrdownname'] = $info[0]['name'];
		    $data['en_rrdownname'] = $info[1]['name'];
		}


		$data['cn_downname'] = $_POST['cn_downname'];
		$data['en_downname'] = $_POST['en_downname'];
		$data['downsort'] = $_POST['downsort'];
		$data['rrfuid'] = $_POST['rrfuid'];


		//$rfinkerdown->where("id = $id")->save($data); // 根据条件更新记录
		M('rfinkerdown')->data($data)->where('id='.$id)->save();
		$this->success('恭喜，操作成功！',U('Rflinkerproduct/rrfelgDown',array('id'=>$data['rrfuid'])));

	}


	//产品下载删除
	public function rrptdndel(){
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		$rfinkerdown = M("rfinkerdown");
		$felgptid = $rfinkerdown->where('id ='.$ids)->getField('rrfuid');
		//print_r($fuid);exit;
	    if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('rfinkerdown')->where($map)->delete()){
				addlog('删除匹配产品下载，ID：'.$ids);
				$this->success('恭喜，删除成功！',U('Rflinkerproduct/rrfelgDown',array('id'=>$felgptid)),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}

	}


    //产品密码下载
	public function rrfelgmmdown(){

        //产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;

		//print_r($id);exit;
		//把产品id 赋值给新增
		$this -> assign('id',$id);

		$where = "rrptid = $id";
		$rfinkerdown = M('rflinkermmdown');
		$list = $rfinkerdown->where($where)->order('mmdownsort')->select();

		$this -> assign('list',$list);

		$this -> display();

	}



	//rflinker密码下载添加
	public function rrfelgmmDownadd(){

		//赋值产品id
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);

		$this -> display();
	}


	//产品密码下载写入
	public function rrfelgptmmdnwrite(){

		$rfinkerdowns = M('rflinkermmdown');

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg','gif', 'png', 'jpeg','pdf','txt','sql','rar');// 设置附件上传类型
		$upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName  = ''; // 可以保存原文件名
	    $upload->replace  = true; // 可以覆盖文件

		// 上传文件
		$info   =   $upload->upload();

		if($info){
			$data['cn_mmdown'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_mmdown'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_mmdownname'] = $info[0]['name'];
			$data['en_mmdownname'] = $info[1]['name'];
		}

		$data['rrptid'] = $_POST['rrfuid'];
		//根据felg产品id查找出对应的频率和类型名称
        $ptid = $_POST['rrfuid'];


        $rrpt = M("rflinkerproduct");
        $rrptHzTtypeFind = "rflinkercnhzname,rflinkerenhzname,rflinkercntypename,rflinkerentypename";
        $HzType = $rrpt->where("id = $ptid")->field($rrptHzTtypeFind)->select();
        //print_r($HzType);exit;


        $data['cn_rrhzname'] = $HzType[0]['rflinkercnhzname'];
        $data['en_rrhzname'] = $HzType[0]['rflinkerenhzname'];
        $data['cn_rrtypename'] = $HzType[0]['rflinkercntypename'];
        $data['en_rrtypename'] = $HzType[0]['rflinkerentypename'];



		$data['cn_rrmmdownname'] = $_POST['cn_downname'];
		$data['en_rrmmdownname'] = $_POST['en_downname'];
		$data['mmdownsort'] = $_POST['downsort'];

	    $result=$rfinkerdowns->create($data);

		// 写入数据
		if($rfinkerdowns->add($data)){

			$this->success('恭喜，操作成功！',U('Rflinkerproduct/rrfelgmmdown',array('id'=>$data['rrptid'])));
		}else {
			$this->error('参数错误！');
		}
	}



	//产品密码下载删除
	public function rrptdnmmdel(){
		$ids = isset($_REQUEST['ids'])?$_REQUEST['ids']:false;
		$rfinkerdown = M("rflinkermmdown");
		$felgptid = $rfinkerdown->where('id ='.$ids)->getField('rrptid');
		//print_r($felgptid);exit;
	    if($ids){
			if(is_array($ids)){
				$ids = implode(',',$ids);
				$map['id']  = array('in',$ids);
			}else{
				$map = 'id='.$ids;
			}
			if(M('rflinkermmdown')->where($map)->delete()){
				addlog('删除匹配产品密码下载，ID：'.$ids);
				$this->success('恭喜，删除成功！',U('Rflinkerproduct/rrfelgmmdown',array('id'=>$felgptid)),3);
			}else{
				$this->error('参数错误！');
			}
		}else{
			$this->error('参数错误！');
		}

	}



	//产品密码下载修改显示
	public function rrmmdownedit(){
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		$this -> assign('id',$id);

		$rflinkermmdown = M('rflinkermmdown');
		$where = "id = $id";
		$fgdown = $rflinkermmdown->where($where)->find();
		//print_r($fgdown);exit;

		$this -> assign('fgdown',$fgdown);
		$this -> display();
	}





	//产品密码下载修改
	public function rrmmdownxiugai(){

		$id = $_POST['id'];
		//print_r($id);exit;
		$rfinkerdown = M('rflinkermmdown');

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     6145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg','gif', 'png', 'jpeg','pdf','txt','sql','rar');// 设置附件上传类型
		$upload->rootPath  =      PUBLICS.'/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName  = ''; // 可以保存原文件名
	    $upload->replace  = true; // 可以覆盖文件
		// 上传文件
		$info   =   $upload->upload();


		if($info){
		    $data['cn_mmdown'] = $info[0]['savepath'].$info[0]['name'];
			$data['en_mmdown'] = $info[1]['savepath'].$info[1]['name'];
			$data['cn_mmdownname'] = $info[0]['name'];
		    $data['en_mmdownname'] = $info[1]['name'];
		}


		$data['cn_rrmmdownname'] = $_POST['cn_downname'];
		$data['en_rrmmdownname'] = $_POST['en_downname'];
		$data['mmdownsort'] = $_POST['downsort'];
		$data['rrptid'] = $_POST['rrfuid'];

        //print_r($data);exit;
		//$rfinkerdown->where("id = $id")->save($data); // 根据条件更新记录
		M('rflinkermmdown')->data($data)->where('id='.$id)->save();
		$this->success('恭喜，操作成功！',U('Rflinkerproduct/rrfelgmmdown',array('id'=>$data['rrptid'])));

	}
}