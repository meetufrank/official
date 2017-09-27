<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class RflinkerController extends ComController {
    public function index(){
		
        //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);
		
		
		//rflinker 产品系列所有频率
		$rflinkerhz = M('rflinkerhz');
		$rflinkerproductyi = M('rflinkerproduct');
		$selectrrhz ="id,".$language."rflinkerhz as rflinkerhz,rrsort";
		$rflinkerhzselect = $rflinkerhz->order('rrsort')->getField($selectrrhz);
		$this->assign('rflinkerhzselect',$rflinkerhzselect);
		
		
		//根据id是否为空,判断是否从首页进来
		$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
		
		if($id == ''){
		
					
					//取出rflinker 产品系列的第一个频率名称
					$selectrrhzyi =$language."rflinkerhz as rflinkerhz";
					$rryiselect = $rflinkerhz->order('rrsort')->limit(1)->getField($selectrrhzyi);
					
					
					//根据rflinker 产品系列的第一个频率名称，查找出对应的所有类型(类型去重)
					$yihztypeselect ="distinct rflinker".$languages."typename as rrtypename";
					$yihzwhere = "rflinker".$languages."hzname = '".$rryiselect."' and rflinker".$languages."typename !='0' order by rrsort";
					$yitypesql = "select $yihztypeselect from qw_rflinkerproduct where $yihzwhere";
					$yitype = $rflinkerproductyi->query($yitypesql);
					$this -> assign('yitype',$yitype);
					
					//定义每次显示产品条数
					$row = 8;
					
					//判断产品总条数
					$coountWhere = "rflinker".$languages."hzname = '".$rryiselect."'";
					$sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;
					
					//查询出符合当前频率的产品有多少
					$icount = $rflinkerproductyi->query($sqlcount);
					$icount = $icount[0]['count'];
					
					//第一次加载页面频率的总数
					$this -> assign('icount',$icount);
					
					//第一次加载页面频率名称
					$this -> assign('rryiselect',$rryiselect);
					
					
					//第一个频率的所有产品
					$selectpthzyi ="id,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rrsort ";
					$wherepthzyi = "rflinker".$languages."hzname = '$rryiselect'";
					$felgptyiselect = $rflinkerproductyi->where($wherepthzyi)->order('rrsort')->limit(0,8)->getField($selectpthzyi);
					$this -> assign('felgptyiselect',$felgptyiselect);
		}else{
			
			
			    //从首页传过来的频率名称
                $rflinkerhz = M('rflinkerhz');
                $hznameyi = $language."rflinkerhz";
			    $hzidyi = "id = $id";
				

			    $indexhzname = $rflinkerhz->where($hzidyi)->getField($hznameyi);
               
                $this->assign('indexhzname',$indexhzname);
        

                 //首页频率的类型
                 $yihztypeselect ="distinct rflinker".$languages."typename as rrtypename";
				 $yihzwhere = "rflinker".$languages."hzname = '".$indexhzname."' and rflinker".$languages."typename !='0' order by rrsort";
				
				 $yitypesql = "select $yihztypeselect from qw_rflinkerproduct where $yihzwhere";
				 $rflinkerproduct = D('rflinkerproduct');
				 $yitype = $rflinkerproduct->query($yitypesql);

				 //print_r($yitype);exit;
				 
				 $this -> assign('yitype',$yitype);



                 //定义每次显示产品条数
			     $row = 8;
		          
			     //判断产品总条数
			     $coountWhere = "rflinker".$languages."hzname = '".$indexhzname."'";
			     $sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;

		         //查询出符合当前频率的产品有多少
			     $icount = $rflinkerproduct->query($sqlcount);
			    
			     $icount = $icount[0]['count'];

               
			     //首页频率名称
			     $this -> assign('rryiselect',$indexhzname);


		         //第一次加载页面频率的总数
		         $this -> assign('icount',$icount);

		         //print_r($icount);exit;

 

				 //首页频率产品
                $selectpthzyi ="id,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rrsort ";
				$wherepthzyi = "rflinker".$languages."hzname = '$indexhzname'";
				$felgptyiselect = $rflinkerproduct->where($wherepthzyi)->order('rrsort')->limit(0,8)->getField($selectpthzyi);
		        $this -> assign('felgptyiselect',$felgptyiselect);
			
			
			
		}
		//print_r($felgptyiselect);exit;
		
		$this->display();
    }
	
	
	
	//页面频率的第一次加载更多
	public function rrhzyijiazai(){
		
		 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

         //rflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');
          
         //传递的页数
         $p = $_POST['p'];

         //频率名称
         $hzname = $_POST['hzname'];
		  
         //定义每次显示产品条数
	     $row = 8;

        //判断产品总条数
		$coountWhere = "rflinker".$languages."hzname = '".$hzname."'";
		$sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;
		
		//查询出符合当前频率的产品有多少
		$icount = $rflinkerproductyi->query($sqlcount);
        $icount = $icount[0]['count'];
		//print_r($icount);exit;
	     //总条数             17
	     $_count = ceil($icount / $row);
        //print_r($_count);exit;
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

        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."rrtitle as rrtitle,".$language."rrimg as rimg,".$language."rrname as rrname,rrsort";

		$ptjiazaiHzWhere = "rflinker".$languages."hzname = "."'".$hzname."' limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_rflinkerproduct` where ".$ptjiazaiHzWhere;
	
		$data = $rflinkerproductyi -> query($sql);
        
		
		echo json_encode($data);
		
	}
	
	
	//频率类型筛选产品
    public function hztypeptyi(){
  
	      //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

	     //rflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');

	     $hzname = $_POST['rrlghzname'];

	     $typename = $_POST['rrhztype'];
		 
	     //定义每次显示产品条数
	     $row = 8;
          
	     //判断产品总条数
	     $coountWhere = "rflinker".$languages."hzname = '".$hzname."' and rflinker".$languages."typename = '".$typename."' order by rrsort";
	     $sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $rflinkerproductyi->query($sqlcount);
	     
	     $icount = $icount[0]['count'];

	    


	     $ptHzTypeYiAllSelect = "id,({$icount}) as count,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rflinker".$languages."hzname as hzname,rflinker".$languages."typename as typename,rrsort";
         
         $ptHzTypeYiAllWhere  = "rflinker".$languages."hzname = '".$hzname."' and rflinker".$languages."typename = '".$typename."' order by rrsort limit 0,8";
         $ptHzTypeYiAllSql = "select $ptHzTypeYiAllSelect from qw_rflinkerproduct where $ptHzTypeYiAllWhere";
		 $ptHzTypeYiAllSqlS = $rflinkerproductyi->query($ptHzTypeYiAllSql);
          
         //print_r($ptHzTypeYiAllSqlS);exit;
        

         echo json_encode($ptHzTypeYiAllSqlS);
	    


    }
	
	
	
	//第一次频率类型加载更多

    public function jiazaihptztypes(){

    	 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

          //rflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');
          
          //传递的页数
          $p = $_POST['p'];


          //频率名称
          $hzname = $_POST['hzname'];

          //类型名称
          $typename = $_POST['typename'];



          //定义每次显示产品条数
	      $row = 8;
   
         //判断产品总条数
	     
	     $coountWhere = "rflinker".$languages."hzname = '".$hzname."' and rflinker".$languages."typename = '".$typename."' order by rrsort";
	     $sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $rflinkerproductyi->query($sqlcount);
	     

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

       
        
        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rrsort";


		$ptjiazaiHzWhere = "rflinker".$languages."hzname = "."'".$hzname."' and rflinker".$languages."typename = '".$typename."'  limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_rflinkerproduct` where ".$ptjiazaiHzWhere;
	    //print_r($sql);exit;
		
		$data = $rflinkerproductyi -> query($sql);
        
		
		echo json_encode($data);


    }
	

	
    //刷选类型(根据ajax传递频率，查找类型)
	public function rrhztypepick(){
		
		  //判断当前语言
		  $language = L('language');
		  $languages = L('languages');
		  
		  //频率名称
		  $rrhzname =  $_POST['rrhzname'];
		
		
		 $HzTypePickSelect = "distinct rflinker".$languages."typename as rrtypename, rflinker".$languages."hzname as hzname";
		 $HzWhere = "rflinker".$languages."hzname = '".$rrhzname."' and rflinker".$languages."typename !='0' order by rrsort";
		
		 $HzTypeSql = "select $HzTypePickSelect from qw_rflinkerproduct where $HzWhere";
		  //rflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');
		 $HzTypes = $rflinkerproductyi->query($HzTypeSql);

		 echo json_encode($HzTypes);

	}
	
	
	//根据频率,查找对应的所有产品
	public function rrhzall(){

	     //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

	     //频率名称
		 $rrhzname =  $_POST['rrhzname'];

         //rflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');

	     //定义每次显示产品条数
	     $row = 8;
          
	     //判断产品总条数
	     $coountWhere = "rflinker".$languages."hzname = '".$rrhzname."'";
	     $sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $rflinkerproductyi->query($sqlcount);
	     
	     $icount = $icount[0]['count'];

     
         //根据频率名称,查询出该频率的所有产品
		 $pthzallWhere = "rflinker".$languages."hzname = '".$rrhzname."' order by rrsort limit 0,8 ";
		    
		 $pthzallSelect ="id,({$icount}) as count,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rflinker".$languages."hzname as hzname,rrsort";
		 $pthzallSql = "select $pthzallSelect from qw_rflinkerproduct where $pthzallWhere";
		 //print_r($pthzallSql);exit;
		 $pthzallSqls = $rflinkerproductyi->query($pthzallSql);
       
         echo json_encode($pthzallSqls);
	}
	
	
	
	
	 //频率的加载更多
    public function Hzgetlist(){

    	 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

         //rrflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');
          
          //传递的页数
          $p = $_POST['p'];

          //print_r($p);exit;
          //频率名称
          $hzname = $_POST['hzname'];

          //定义每次显示产品条数
	      $row = 8;
   
         //判断产品总条数
	     $coountWhere = "rflinker".$languages."hzname = '".$hzname."'";
	     $sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $rflinkerproductyi->query($sqlcount);
	     

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


        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rrsort";


		$ptjiazaiHzWhere = "rflinker".$languages."hzname = "."'".$hzname."' limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_rflinkerproduct` where ".$ptjiazaiHzWhere;
		
		
		$data = $rflinkerproductyi -> query($sql);
        //print_r($data);exit;
		
		echo json_encode($data);


    }
	
	
	//根据频率和类型查找对应所有产品
   public function typeptall(){

         //判断当前语言
	     $language = L('language');
	     $languages = L('languages');
         
         //频率名称
		 $rrhzname = $_POST['rrhzname'];

         //类型名称
		 $rrtypename =  $_POST['rrtypename'];


		 //rrflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');


		 //定义每次显示产品条数
	     $row = 8;

	     
          
	     //判断产品总条数
	     $coountWhere = "rflinker".$languages."hzname = '".$rrhzname."' and rflinker".$languages."typename = '".$rrtypename."' order by rrsort";
	     $sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;



         //查询出符合当前频率的产品有多少
	     $icount = $rflinkerproductyi->query($sqlcount);
	     
	     $icount = $icount[0]['count'];

         
         $ptHzTypeAllSelect = "id,({$icount}) as count,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rflinker".$languages."hzname as hzname,rflinker".$languages."typename as typename,rrsort";
         
         $ptHzTypeAllWhere  = "rflinker".$languages."hzname = '".$rrhzname."' and rflinker".$languages."typename = '".$rrtypename."' order by rrsort limit 0,8";
         $ptHzTypeAllSql = "select $ptHzTypeAllSelect from qw_rflinkerproduct where $ptHzTypeAllWhere";
		 $ptHzTypeAllSqlS = $rflinkerproductyi->query($ptHzTypeAllSql);
          
        

         echo json_encode($ptHzTypeAllSqlS);
		


   }
	
	
	
    //频率类型的加载更多
    public function HzTypegetlist(){

    	 //判断当前语言
	     $language = L('language');
	     $languages = L('languages');

         //rrflinker产品
	     $rflinkerproductyi = M('rflinkerproduct');
          
          //传递的页数
          $p = $_POST['p'];


          //频率名称
          $hzname = $_POST['hzname'];

          //类型名称
          $typename = $_POST['typename'];

          //定义每次显示产品条数
	      $row = 8;
   
         //判断产品总条数
	     
	     $coountWhere = "rflinker".$languages."hzname = '".$hzname."' and rflinker".$languages."typename = '".$typename."' order by rrsort";
	     $sqlcount ="select count(*) as count from qw_rflinkerproduct where ".$coountWhere;

         //查询出符合当前频率的产品有多少
	     $icount = $rflinkerproductyi->query($sqlcount);
	     

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

       
        
        $ptjiazaiHzSelect ="id,({$_count}) as count,".$language."rrtitle as rrtitle,".$language."rrimg as rrimg,".$language."rrname as rrname,rrsort";


		$ptjiazaiHzWhere = "rflinker".$languages."hzname = "."'".$hzname."' and rflinker".$languages."typename = '".$typename."'  limit $offset,$row";
		$sql = "select $ptjiazaiHzSelect from `qw_rflinkerproduct` where ".$ptjiazaiHzWhere;
	//print_r($sql);exit;
		
		$data = $rflinkerproductyi -> query($sql);
        
		
		echo json_encode($data);


    }
	
}