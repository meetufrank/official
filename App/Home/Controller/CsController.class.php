<?php
/**
*
* 版权所有：恰维网络<qwadmin.qiawei.com>
* 作    者：寒川<hanchuan@qiawei.com>
* 日    期：2016-01-21
* 版    本：1.0.0
* 功能说明：前台控制器演示。
*
**/



namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class CsController extends ComController {
    public function index(){



		$this -> display();
    }

    public function lang(){

    	setcookie('think_language','en-us');
    }

	public function search(){
		
		//判断当前语言
		$language = L('language');
		$languages = L('languages');
	
		$contents = $_POST['contents'];
		
		
		
		
		
		$searchSelect = "felg".$languages."typename as felgname";
		$searchWhere = "felg".$languages."typename like '%".$contents."%' order by ftsort";
		$searchSql = "select $searchSelect from qw_felgproduct where $searchWhere";
		$felgproduct = D('felgproduct');
		$searchs = $felgproduct->query($searchSql);
		echo json_encode($searchs);
		//print_r($searchs);exit;
		
	}
	
	
	public function email(){
		
		//调用email接口方法
	    $emails = new \Org\Util\Cs;
		
		$to = $_POST['to'];
		
		$YouxiangContent = "用户姓名:&nbsp;&nbsp;".$name."<br/><br/>用户电话:&nbsp;&nbsp;".$tel."<br/><br/>用户邮箱:&nbsp;&nbsp;".$email."<br/><br/>用户留言:&nbsp;&nbsp;".$content;
		$emailtrue = $emails->sentemail($to,$youxaingtitle,$YouxiangContent);
		
	}


}