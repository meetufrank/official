<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class AboutusController extends ComController {
    public function index(){

        
		
        //判断当前语言
		$language = L('language');
		$this->assign('language',$language);
		
		
		
		
		
		$this -> display();
		
    }

   
   
   
   
   
   
		
	


}