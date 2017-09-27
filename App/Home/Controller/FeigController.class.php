<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class FeigController extends ComController {
    public function index(){
		
        //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);
		
	
		
	
		$this->display();
		
		
    }

	
	//页面第一次加载  类型点击1.加上样式
	public function pppickyi(){
		
		
		
		
		
	}

    

    //频率类型筛选产品
    public function hztypeptyi(){
  
	      //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

	      //felg产品
	     $felgproduct = D('felgproduct');

	     $hzname = $_POST['felghzname'];

	     $typename = $_POST['felghztype'];
 
	     //定义每次显示产品条数
	     $row = 8;
          
	     //判断产品总条数
	     $coountWhere = "felg".$languages."hzname = '".$hzname."' and felg".$languages."typename = '".$typename."' order by ftsort";
	     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $felgproduct->query($sqlcount);
	     
	     $icount = $icount[0]['count'];

	    


	     $ptHzTypeYiAllSelect = "id,({$icount}) as count,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,felg".$languages."hzname as hzname,felg".$languages."typename as typename,ftsort";
         
         $ptHzTypeYiAllWhere  = "felg".$languages."hzname = '".$hzname."' and felg".$languages."typename = '".$typename."' order by ftsort limit 0,8";
         $ptHzTypeYiAllSql = "select $ptHzTypeYiAllSelect from qw_felgproduct where $ptHzTypeYiAllWhere";
		 $ptHzTypeYiAllSqlS = $felgproduct->query($ptHzTypeYiAllSql);
          
         //print_r($ptHzTypeYiAllSqlS);exit;
        

         echo json_encode($ptHzTypeYiAllSqlS);
	    


    }
	


	 //页面频率的第一次加载更多
    public function felghzyijiazai(){

    	 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

         //felg产品
	     $felgproduct = D('felgproduct');
          
          //传递的页数
          $p = $_POST['p'];


          //频率名称
          $hzname = $_POST['hzname'];

 

         //定义每次显示产品条数
	     $row = 8;
   


         //判断产品总条数
	     $coountWhere = "felg".$languages."hzname = '".$hzname."'";
	     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $felgproduct->query($sqlcount);
	    

	     //总条数
	     $_count = ceil($icount[0]['count'] / $row);

         if(!isset($p)){
			$p = 1;
		}else{
			$p = $p;
			if($p > $_count){
				$p = $_count;
			}
		}
        //当前页码
		$offset = ($p - 1) * $row;


        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,ftsort";


		$ptjiazaiHzWhere = "felg".$languages."hzname = "."'".$hzname."' limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_felgproduct` where ".$ptjiazaiHzWhere;
		
		
		$data = $felgproduct -> query($sql);
        //print_r($sql);exit;
		
		echo json_encode($data);


    }



	//第一次频率类型加载更多

    public function jiazaihptztypes(){

    	 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

         //felg产品
	     $felgproduct = D('felgproduct');
          
          //传递的页数
          $p = $_POST['p'];


          //频率名称
          $hzname = $_POST['hzname'];

          //类型名称
          $typename = $_POST['typename'];



          //定义每次显示产品条数
	      $row = 8;
   
         //判断产品总条数
	     
	     $coountWhere = "felg".$languages."hzname = '".$hzname."' and felg".$languages."typename = '".$typename."' order by ftsort";
	     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $felgproduct->query($sqlcount);
	     

	     //总条数
	     $_count = ceil($icount[0]['count'] / $row);

      
         

         if(!isset($p)){
			$p = 1;
		}else{
			$p = $p;
			if($p > $_count){
				$p = $_count;
			}
		}
        //当前页码
		$offset = ($p - 1) * $row;

       
        
        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,ftsort";


		$ptjiazaiHzWhere = "felg".$languages."hzname = "."'".$hzname."' and felg".$languages."typename = '".$typename."'  limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_felgproduct` where ".$ptjiazaiHzWhere;
	    //print_r($sql);exit;
		
		$data = $felgproduct -> query($sql);
        
		
		echo json_encode($data);


    }
	
	
	//刷选类型(根据ajax传递频率，查找类型)
	public function felghztypepick(){
		
		  //判断当前语言
		  $language = L('language');
		  $languages = L('languages');
		  
		  $typehz =  $_POST['felghztype'];
		  
		  //频率名称
		  $felghzname =  $_POST['felghzname'];
		  
		
		 $HzTypePickSelect = "distinct felg".$languages."typename as fgtypename, felg".$languages."hzname as hzname";
		 $HzWhere = "felg".$languages."hzname = '".$felghzname."' and felg".$languages."typename !='0' order by ftsort";
		
		 $HzTypeSql = "select $HzTypePickSelect from qw_felgproduct where $HzWhere";
		 $felgproduct = D('felgproduct');
		 $HzTypes = $felgproduct->query($HzTypeSql);

		 //print_r($HzTypeSql);exit;

		 echo json_encode($HzTypes);

	}
	


	//根据频率,查找对应的所有产品
	public function felghzall(){

	     //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

	     //频率名称
		 $felghzname =  $_POST['felghzname'];


 
         $felgproduct = D('felgproduct');


	     //定义每次显示产品条数
	     $row = 8;
          
	     //判断产品总条数
	     $coountWhere = "felg".$languages."hzname = '".$felghzname."'";
	     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $felgproduct->query($sqlcount);
	     
	     $icount = $icount[0]['count'];

	              
         
   

         //根据频率名称,查询出该频率的所有产品
		 $pthzallWhere = "felg".$languages."hzname = '".$felghzname."' order by ftsort limit 0,8 ";
		 $pthzallSelect ="id,({$icount}) as count,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,felg".$languages."hzname as hzname,ftsort";
		 $pthzallSql = "select $pthzallSelect from qw_felgproduct where $pthzallWhere";
		 $pthzallSqls = $felgproduct->query($pthzallSql);
       
         echo json_encode($pthzallSqls);
	}
             
    

    //频率的加载更多
    public function Hzgetlist(){

    	 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

         //felg产品
	     $felgproduct = D('felgproduct');
          
          //传递的页数
          $p = $_POST['p'];


          //频率名称
          $hzname = $_POST['hzname'];

          //定义每次显示产品条数
	      $row = 8;
   
         //判断产品总条数
	     $coountWhere = "felg".$languages."hzname = '".$hzname."'";
	     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $felgproduct->query($sqlcount);
	     

	     //总条数
	     $_count = ceil($icount[0]['count'] / $row);

         if(!isset($p)){
			$p = 1;
		}else{
			$p = $p;
			if($p > $_count){
				$p = $_count;
			}
		}
        //当前页码
		$offset = ($p - 1) * $row;

       
          //print_r($icount);
          // print_r($hzname);
          //exit;
        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,ftsort";


		$ptjiazaiHzWhere = "felg".$languages."hzname = "."'".$hzname."' limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_felgproduct` where ".$ptjiazaiHzWhere;
		
		
		$data = $felgproduct -> query($sql);
        	//print_r($data);exit;
		
		echo json_encode($data);


    }
 



   //根据频率和类型查找对应所有产品
   public function typeptall(){

         //判断当前语言
	     $language = L('language');
	     $languages = L('languages');
         
         //频率名称
		 $felghzname = $_POST['felghzname'];

         //类型名称
		 $felgtypename =  $_POST['felgtypename'];


		 $felgproduct = D('felgproduct');


		 //定义每次显示产品条数
	     $row = 8;

	     
          
	     //判断产品总条数
	     $coountWhere = "felg".$languages."hzname = '".$felghzname."' and felg".$languages."typename = '".$felgtypename."' order by ftsort";
	     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;



         //查询出符合当前频率的产品有多少
	     $icount = $felgproduct->query($sqlcount);
	     
	     $icount = $icount[0]['count'];

         
         $ptHzTypeAllSelect = "id,({$icount}) as count,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,felg".$languages."hzname as hzname,felg".$languages."typename as typename,ftsort";
         
         $ptHzTypeAllWhere  = "felg".$languages."hzname = '".$felghzname."' and felg".$languages."typename = '".$felgtypename."' order by ftsort limit 0,8";
         $ptHzTypeAllSql = "select $ptHzTypeAllSelect from qw_felgproduct where $ptHzTypeAllWhere";
		 $ptHzTypeAllSqlS = $felgproduct->query($ptHzTypeAllSql);
          
        

         echo json_encode($ptHzTypeAllSqlS);
		


   }






   //频率类型的加载更多
    public function HzTypegetlist(){

    	 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

         //felg产品
	     $felgproduct = D('felgproduct');
          
          //传递的页数
          $p = $_POST['p'];


          //频率名称
          $hzname = $_POST['hzname'];

          //类型名称
          $typename = $_POST['typename'];

          //定义每次显示产品条数
	      $row = 8;
   
         //判断产品总条数
	     
	     $coountWhere = "felg".$languages."hzname = '".$hzname."' and felg".$languages."typename = '".$typename."' order by ftsort";
	     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $felgproduct->query($sqlcount);
	     

	     //总条数
	     $_count = ceil($icount[0]['count'] / $row);

      
         

         if(!isset($p)){
			$p = 1;
		}else{
			$p = $p;
			if($p > $_count){
				$p = $_count;
			}
		}
        //当前页码
		$offset = ($p - 1) * $row;

       
        
        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,ftsort";


		$ptjiazaiHzWhere = "felg".$languages."hzname = "."'".$hzname."' and felg".$languages."typename = '".$typename."'  limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_felgproduct` where ".$ptjiazaiHzWhere;
	//print_r($sql);exit;
		
		$data = $felgproduct -> query($sql);
        
		
		echo json_encode($data);


    }


}