<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class IndexController extends ComController {
    public function index(){

        
		
        //判断当前语言
		$language = L('language');
		$this->assign('language',$language);
		
		//felg rflinker  推荐产品
		$Indexshow = M('Indexshow');
		$indexshowwhere = "id,".$language."fghzname as fghzname,".$language."fghzshow as fghzshow,".$language."rrhzname as rrhzname,".$language."rrhzshow as rrhzshow,"
		.$language."tjhzname as tjhzname,"
		.$language."tjhzshow as tjhzshow";
		$indexshowlist = $Indexshow->field($indexshowwhere)->find();
		
		$this -> assign('indexshowlist',$indexshowlist);
		//print_r($indexshowlist);exit;
		
		
		//首页轮播图片
		$flashview = M('flashview');
		$selectimg="id,".$language."flashviewpc as flashviewpc,".$language."title as title,".$language."fwshowpc as fwshowpc,".$language."fwlink as fwlink,fwsort";
		$img = $flashview->order('fwsort')->getField($selectimg);
		$this->assign('img',$img);
		//print_r($img);exit;
		
		
		
		//FELG产品
		$felghz = M('felghz');
		$selectfelghz="id,".$language."fghz as fghz,".$language."fghztitle as fghztitle,".$language."fghzimg as fghzimg,fghzsort";
		$felghzs = $felghz->order('fghzsort')->limit(4)->getField($selectfelghz);
		
		//查询出felg下类型的第一个频率
		foreach($felghzs as $key => $val){
			$hzid = $val['id'];
            $indexhztypewhere = $language."hzid = $hzid";			
			$indexhztype = M("felgtype")->where($indexhztypewhere)->order("fgtypesort")->limit(1)->select();
			foreach($indexhztype as $k => $v){
				
				$felghzs[$key]['typeid'] = $v['id'];
			}
			
			
		}
		
		$this->assign('felghzs',$felghzs);
		
		
		//rflinker产品
		$rflinkerhz = M('rflinkerhz');
		$selectrrhz="id,".$language."rflinkerhz as rflinkerhz,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,rrsort";
		$rrzs = $rflinkerhz->order('rrsort')->limit(4)->getField($selectrrhz);
		$this->assign('rrzs',$rrzs);
		//print_r($rrzs);exit;
		
		//推荐产品
		$tuijian = M('tuijian');
		$tuijianselect = "id,".$language."felgname as felgname,".$language."rrname as rrname,type,tjsotr";
		$tuijians = $tuijian->order('tjsotr')->getField($tuijianselect);
		//print_r($tuijians);exit;
		
		$this -> assign('tuijians',$tuijians);

		//行业应用
		$industry = M('industry');
		$selectiy = "id,".$language."imgiy as imgiy,iysort"; 
		$iyimg = $industry->order('iysort')->limit(4)->getField($selectiy);
		$this->assign('iyimg',$iyimg);
		
		$this -> display();
		
    }

   
     
    public function email(){
		

	    $emails = new \Org\Util\Email;
      
	    //获取提交联系我们内容
		//提问姓名
		$name = $_POST['UserName'];
		
		//提问邮箱
		$email = $_POST['UserMail'];
		
		//提问内容
		$content = $_POST['TextSay'];
		
		//提问问题
		$wenti = $_POST['SelectType'];
		
		//提问电话
		$tel = $_POST['UserTel'];
		
		//判断提问类型，邮件类处理相应邮箱
		if($wenti == 1){
			$to = 1;
		}elseif($wenti == 2){
			$to = 2;
		}
		
		//处理标题
		if($wenti == 1){
			$youxaingtitle = "其他类问题";
		}elseif($wenti == 2){
			$youxaingtitle = "销售类问题";
		}
		
		$YouxiangContent = "用户姓名:&nbsp;&nbsp;".$name."<br/><br/>用户电话:&nbsp;&nbsp;".$tel."<br/><br/>用户邮箱:&nbsp;&nbsp;".$email."<br/><br/>用户留言:&nbsp;&nbsp;".$content;
		$emailtrue = $emails->sentemail($to,$youxaingtitle,$YouxiangContent);
		
		
		//添加到数据库
		$message = M("message"); // 实例化User对象
		$data['mtype'] = $wenti;
		$data['mname'] = $name;
		$data['memail'] = $email;
		$data['mcontent'] = $content;
		$data['mtel'] = $tel;
		$data['mtime'] = date("Y-m-d h:i:s");
		
		$message->add($data);

		if($emailtrue){
			echo 1;
			echo $date;
		}
		
	}


}