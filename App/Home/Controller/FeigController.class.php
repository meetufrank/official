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
		
	
		
		//FELG 频率 和  类型
		//频率
		$felghz = M('felghz');
		$selectfelghz ="id,".$language."fghz as fghz,fghzsort";
		$felghzselect = $felghz->order('fghzsort')->getField($selectfelghz);
		$this->assign('felghzselect',$felghzselect);

        //根据id是否为空,判断是否从首页进来
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
        


		if($id == ''){
		        //第一次加载时,第一个频率的类型
				//第一个频率
				$hzyis = $language."fghz as fghz";
				$hzyiselect = $felghz->order('fghzsort')->limit(1)->getField($hzyis);
				
				
				
				 //根据第一个频率,查询出它的所有类型
				 $yihztypeselect ="distinct felg".$languages."typename as fgtypename";
				 $yihzwhere = "felg".$languages."hzname = '".$hzyiselect."' and felg".$languages."typename !='0' order by ftsort";
				
				 $yitypesql = "select $yihztypeselect from qw_felgproduct where $yihzwhere";
				 $felgproduct = D('felgproduct');
				 $yitype = $felgproduct->query($yitypesql);
				 
				 $this -> assign('yitype',$yitype);
				 
				 //print_r($yitype);exit;
				
		        //第一个频率的产品信息
		        
		         //定义每次显示产品条数
			     $row = 8;
		          
			     //判断产品总条数
			     $coountWhere = "felg".$languages."hzname = '".$hzyiselect."'";
			     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

		         //查询出符合当前频率的产品有多少
			     $icount = $felgproduct->query($sqlcount);
			     
			     $icount = $icount[0]['count'];


		         //第一次加载页面频率的总数
		         $this -> assign('icount',$icount);


		         //第一次加载页面频率名称
		         $this -> assign('hzyiselect',$hzyiselect);


				$selectpthzyi ="id,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,ftsort ";
				$wherepthzyi = "felg".$languages."hzname = '$hzyiselect'";
				$felgptyiselect = $felgproduct->where($wherepthzyi)->order('ftsort')->limit(0,8)->getField($selectpthzyi);
		        $this -> assign('felgptyiselect',$felgptyiselect);
		        //print_r($felgptyiselect);exit;
		}else{

			    //从首页传过来的频率名称
                $felghzyi = M('felghz');
                $hznameyi = $language."fghz";
			    $hzidyi = "id = $id";

			    $indexhzname = $felghzyi->where($hzidyi)->getField($hznameyi);
                
                $this->assign('indexhzname',$indexhzname);
        

                 //首页频率的类型
                 $yihztypeselect ="distinct felg".$languages."typename as fgtypename";
				 $yihzwhere = "felg".$languages."hzname = '".$indexhzname."' and felg".$languages."typename !='0' order by ftsort";
				
				 $yitypesql = "select $yihztypeselect from qw_felgproduct where $yihzwhere";
				 $felgproduct = D('felgproduct');
				 $yitype = $felgproduct->query($yitypesql);

				 //print_r($yitype);exit;
				 
				 $this -> assign('yitype',$yitype);



                 //定义每次显示产品条数
			     $row = 8;
		          
			     //判断产品总条数
			     $coountWhere = "felg".$languages."hzname = '".$indexhzname."'";
			     $sqlcount ="select count(*) as count from qw_felgproduct where ".$coountWhere;

		         //查询出符合当前频率的产品有多少
			     $icount = $felgproduct->query($sqlcount);
			     
			     $icount = $icount[0]['count'];


			     //首页频率名称
			     $this -> assign('hzyiselect',$indexhzname);


		         //第一次加载页面频率的总数
		         $this -> assign('icount',$icount);

		         //print_r($icount);exit;

 

				 //首页频率产品
                $selectpthzyi ="id,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftname as ftname,ftsort ";
				$wherepthzyi = "felg".$languages."hzname = '$indexhzname'";
				$felgptyiselect = $felgproduct->where($wherepthzyi)->order('ftsort')->limit(0,8)->getField($selectpthzyi);
		        $this -> assign('felgptyiselect',$felgptyiselect);
                
                //print_r($felgptyiselect);exit;




		}







		//产品列表图片
		$productlistimgs = 	M('productlistimgs');
		$productlistimgsfield = "id,".$language."flashviewpc as flashviewpc,".$language."fwlink as fwlink,"
		.$language."flashviewphone as flashviewphone,"
		.$language."fwshowpc as fwshowpc,"
		.$language."fwshowphone as fwshowphone,fwsort";
		$productlistimgss = $productlistimgs->order('fwsort')->getField($productlistimgsfield);
		

		
		 $this -> assign('productlistimgss',$productlistimgss);
		
		//print_r($productlistimgss);exit;
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