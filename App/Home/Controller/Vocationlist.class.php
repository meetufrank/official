<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class IndexController extends ComController {
    public function index(){

        
		
        //判断当前语言
		$language = L('language');
		$this->assign('language',$language);
		
		
		
		
		//首页轮播图片
		$flashview = M('flashview');
		$selectimg="id,".$language."flashviewpc as flashviewpc,".$language."fwshowpc as fwshowpc,".$language."fwlink as fwlink,fwsort";
		$img = $flashview->order('fwsort')->getField($selectimg);
		$this->assign('img',$img);
		
		
		

		//行业应用
		$industry = M('industry');
		$selectiy = "id,".$language."imgiy as imgiy,iysort"; 
		$iyimg = $industry->order('iysort')->getField($selectiy);
		$this->assign('iyimg',$iyimg);
		/* print_r($iyimg);exit; */
		$this -> display();
		
    }

   
   
   
   
   
    public function email(){
		
	    $emails = new \Org\Util\Email;
      
	    //获取提交联系我们内容
		$name = $_POST['name'];
		$email = $_POST['email'];
		$content = $_POST['content'];
		$wenti = $_POST['wenti'];
		
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
		
		$YouxiangContent = "用户姓名:&nbsp;&nbsp;".$name."<br/><br/>用户邮箱:&nbsp;&nbsp;".$email."<br/><br/>用户留言:&nbsp;&nbsp;".$content;
		$emailtrue = $emails->sentemail($to,$youxaingtitle,$YouxiangContent);
		
		
		//添加到数据库
		$message = M("message"); // 实例化User对象
		$data['mtype'] = $wenti;
		$data['mname'] = $name;
		$data['memail'] = $email;
		$data['mcontent'] = $content;
		$message->add($data);

		if($emailtrue){
			$date = 1;
			echo $date;
		}
		
	}


}