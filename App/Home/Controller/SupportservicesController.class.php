<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class SupportservicesController extends ComController {

    public function index(){

        //判断当前语言
		$language = L('language');
		$this->assign('language',$language);
		

        $dwuser = M('dwuser');
        $dwuserdown = M('dwuserdown');
		
		$name = $_GET['name'];

        //根据名称查出用户id
        $dwuserSelect = "id as id";
        $dwuserWhere = "dowusername = '".$name."'";
        $dwusersql = "select $dwuserSelect from qw_dwuser where $dwuserWhere";
        $userid = $dwuser -> query($dwusersql);
		
		
		//根据id查出所有的down文件
		$fuid = $userid[0]['id'];
		$dwuserdownSelect = $language."down as down,".$language."downname as downname";
        $dwuserdownWhere = "dwuserid = $fuid";
        $dwuserdownsql = "select $dwuserdownSelect from qw_dwuserdown where $dwuserdownWhere";
        $dwuserdowns = $dwuserdown -> query($dwuserdownsql);
		$this -> assign('list',$dwuserdowns);
		
		//print_r($dwuserdowns);exit;
		
		

        //产品验证码下载筛选
        $felgptmmdown = M('felgptmmdown');
        $felgproduct = M('felgproduct');

        //1.查找出所有felg产品验证码下载的频率
        $HzSelect = "distinct ".$language."felghzname as hzname";
        $Hzsql = "select $HzSelect from qw_felgptmmdown order by mmdownsort";

        $Hz = $felgptmmdown -> query($Hzsql);

        $this -> assign('Hz',$Hz);




        //找出第一个频率下的所有类型,产品名称,文档下载

        //频率的第一个
        $YiHzName = $Hz[0]['hzname'];
        $this -> assign('YiHzName',$YiHzName);

        //查询出第一个频率的所有类型
        $TypeSelect = "distinct ".$language."felgtypename as typename";
        $TypeWhere = $language."felghzname = '".$YiHzName."'";
        $Typesql = "select $TypeSelect from qw_felgptmmdown where $TypeWhere";
        $Type = $felgptmmdown -> query($Typesql);
        $this -> assign('Type',$Type);


        //查询出第一个频率的所有产品名称
        //产品id
        $PtSelect = "felgptid as felgptid";
        $PtWhere = $language."felghzname = '".$YiHzName."'";
        $Ptsql = "select $PtSelect from qw_felgptmmdown where $PtWhere";
        $Pt = $felgptmmdown -> query($Ptsql);

        foreach($Pt as $v){
            $ptid[] = $v['felgptid'];
        }
        $ptids = join(',',$ptid);


        //根据产品id查询出对应的产品名称
        if(!empty($ptids)){
            $PtNameSelect = $language."ftname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_felgproduct where $PtNameWhere";
            $PtName = $felgproduct -> query($PtNameSql);
            $this -> assign('PtName',$PtName);

        }




        //根据第一个频率查找出所有的下载文档
        $PtDocSelect = $language."mmdownname as docname,".$language."mmdown as docurl";
        $PtDocWhere = $language."felghzname = '".$YiHzName."'";
        $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere limit 0,8";
        $PtDoc = $felgptmmdown -> query($PtDocSql);
        $this -> assign('PtDoc',$PtDoc);
        //print_r($PtDoc);exit;

        //第一次加载更多
        $coountWhere = $language."felghzname = '".$YiHzName."'";
        $sqlcount ="select count(*) as count from qw_felgptmmdown where ".$coountWhere;
        //查询出符合当前频率的产品有多少
        $icount = $felgproduct->query($sqlcount);
        $icount = $icount[0]['count'];
        //print_r($icount);exit;
        //第一次加载页面频率的总数
        $this -> assign('icount',$icount);
        //print_r($icount);exit;




		$this -> display();

    }





    //下载筛选
    public function docdwons(){

        //判断当前语言
        $language = L('language');
        $this->assign('language',$language);

        //felg密码下载
        $felgptmmdown = M('felgptmmdown');
        //felg产品表
        $felgproduct = M('felgproduct');


        //频率名称
        $hzname = $_POST['hzname'];
        //产品名称
        $typename = $_POST['typename'];
        //文档下载名称
        $ptname = $_POST['ptname'];




        //频率
        if(empty($typename) and empty($ptname)){

            //查询出对应的类型
            $TypeSelect = "distinct ".$language."felgtypename as typename";
            $TypeWhere = $language."felghzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_felgptmmdown where $TypeWhere order by mmdownsort";
            $Type = $felgptmmdown -> query($Typesql);



            //加载更多
            $coountWhere = $language."felghzname = '".$hzname."'";
            $sqlcount ="select count(*) as count from qw_felgptmmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $felgproduct->query($sqlcount);
            //print_r($icount[0]['count']);exit;

            //查询文档下载总数
            $downptCount = $icount[0]['count'];

            //定义每次显示产品条数
            $row = 8;

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




            //查询出对应的产品
            //根据频率查询出产品id
            $PtSelect = "felgptid as felgptid";
            $PtWhere = $language."felghzname = '".$hzname."'";
            $Ptsql = "select $PtSelect from qw_felgptmmdown where $PtWhere order by mmdownsort";
            $Pt = $felgptmmdown -> query($Ptsql);

            foreach($Pt as $v){
                $ptid[] = $v['felgptid'];
            }
            $ptids = join(',',$ptid);


            //根据产品id查询出对应的产品名称
            $PtNameSelect = $language."ftname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_felgproduct where $PtNameWhere";
            $PtName = $felgptmmdown -> query($PtNameSql);


            //根据频率查找出所有的下载文档
            $PtDocSelect = $language."mmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."felghzname = '".$hzname."'";
            $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere limit $offset,$row";

            $PtDoc = $felgptmmdown -> query($PtDocSql);


            //产品类型
            $data['type'] = $Type;
            //产品名称
            $data['ptname'] = $PtName;
            //频率所有文档
            $data['ptdoc'] = $PtDoc;
            $hzs = 1;
            $data['hz'] = $hzs;


        }



        //类型筛选
        if($typename != '7'){

        if($typename != '6'){
            if($typename != 'typeall' and $typename != ''){


            //查询出对应的类型
            $TypeSelect = "distinct ".$language."felgtypename as typename";
            $TypeWhere = $language."felghzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_felgptmmdown where $TypeWhere order by mmdownsort";

            $Type = $felgptmmdown -> query($Typesql);

            foreach($Type as &$TypeList){
                $TypeList['hzname'] = $HzName;
            }

            //查询出对应的产品id
            $PtSelect =  "felgptid as felgptid";
            $PtWhere = $language."felghzname = '".$hzname."' and ".$language."felgtypename ='".$typename."'";
            $Ptsql = "select $PtSelect from qw_felgptmmdown where $PtWhere order by mmdownsort";

            $Pt = $felgptmmdown -> query($Ptsql);


            foreach($Pt as $k => $v){
                    $ptid[] = $v['felgptid'];
            }

            $ptids = join(',',$ptid);


                        //根据产品id查询出对应的产品名称
                        $PtNameSelect = $language."ftname as ftname";
                        $PtNameWhere = "id in($ptids)";
                        $PtNameSql = "select $PtNameSelect from qw_felgproduct where $PtNameWhere";
                        $PtName = $felgproduct -> query($PtNameSql);


            //加载更多
            $coountWhere = $language."felghzname = '".$hzname."' and ".$language."felgtypename ='".$typename."'";
            $sqlcount ="select count(*) as count from qw_felgptmmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $felgproduct->query($sqlcount);
            //print_r($icount[0]['count']);exit;

            //查询文档下载总数
            $downptCount = $icount[0]['count'];

            //定义每次显示产品条数
            $row = 8;

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



            //根据频率查找出所有的下载文档
            $PtDocSelect = $language."mmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."felghzname = '".$hzname."' and ".$language."felgtypename ='".$typename."'";
            $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere limit $offset,$row";

            $PtDoc = $felgptmmdown -> query($PtDocSql);




            //产品名称
            $data['ptname'] = $PtName;
            //频率所有文档
            $data['ptdoc'] = $PtDoc;

            $types = 2;
            $data['types'] = $types;



           }
       }

}



        //类型全部
        if($typename == 'typeall'){

            //查询出对应的类型
            $TypeSelect = "distinct ".$language."felgtypename as typename";
            $TypeWhere = $language."felghzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_felgptmmdown where $TypeWhere order by mmdownsort";
            $Type = $felgptmmdown -> query($Typesql);


            //查询出对应的产品
            //根据频率查询出产品id
            $PtSelect = "felgptid as felgptid";
            $PtWhere = $language."felghzname = '".$hzname."'";
            $Ptsql = "select $PtSelect from qw_felgptmmdown where $PtWhere order by mmdownsort";
            $Pt = $felgptmmdown -> query($Ptsql);

            foreach($Pt as $v){
                $ptid[] = $v['felgptid'];
            }
            $ptids = join(',',$ptid);


            //根据产品id查询出对应的产品名称
            $PtNameSelect = $language."ftname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_felgproduct where $PtNameWhere";
            $PtName = $felgptmmdown -> query($PtNameSql);


            //加载更多
            $coountWhere = $language."felghzname = '".$hzname."'";
            $sqlcount ="select count(*) as count from qw_felgptmmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $felgproduct->query($sqlcount);
            //print_r($icount[0]['count']);exit;

            //查询文档下载总数
            $downptCount = $icount[0]['count'];

            //定义每次显示产品条数
            $row = 8;

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

            //根据频率查找出所有的下载文档
            $PtDocSelect = $language."mmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."felghzname = '".$hzname."'";
            $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere limit $offset,$row";
            $PtDoc = $felgptmmdown -> query($PtDocSql);

            //产品类型
            $data['type'] = $Type;
            //产品名称
            $data['ptname'] = $PtName;
            //频率所有文档
            $data['ptdoc'] = $PtDoc;
            $hzs = 21;
            $data['hz'] = $hzs;


        }


        //产品名称筛选
        if($typename == '6'){

               //根据产品名称查出对应的产品id
                $PtIdSelect = "id";
                $PtIdWhere = $language."ftname = '".$ptname."'";
                $PtIdSql = "select $PtIdSelect from qw_felgproduct where $PtIdWhere";
                $PtId = $felgproduct -> query($PtIdSql);

                foreach($PtId as $v){
                    $ptid = $v['id'];
                }

                $PtDocSelect = $language."mmdownname as docname,".$language."mmdown as docurl";
                $PtDocWhere = $language."felghzname = '".$hzname."' and felgptid = $ptid";
                $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere";
                $PtDoc = $felgptmmdown -> query($PtDocSql);



                //根据频率、id查出对应的类型
                $TypeSelect = "distinct ".$language."felgtypename as typename";
                $TypeWhere = $language."felghzname = '".$hzname."' and felgptid = ".$ptid;
                $Typesql = "select $TypeSelect from qw_felgptmmdown where $TypeWhere order by mmdownsort";
                $Type = $felgptmmdown -> query($Typesql);


                //频率所有文档
                $data['ptdoc'] = $PtDoc;
                //类型
                $data['type'] = $Type;
                $pts = 3;

                $data['pts'] = $pts;

        }

        //产品名称全部
        if($ptname == 'ptall'){


            //查询出对应的类型
            $TypeSelect = "distinct ".$language."felgtypename as typename";
            $TypeWhere = $language."felghzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_felgptmmdown where $TypeWhere order by mmdownsort";
            $Type = $felgptmmdown -> query($Typesql);


            //查询出对应的产品
            //根据频率查询出产品id
            $PtSelect = "felgptid as felgptid";
            $PtWhere = $language."felghzname = '".$hzname."'";
            $Ptsql = "select $PtSelect from qw_felgptmmdown where $PtWhere order by mmdownsort";
            $Pt = $felgptmmdown -> query($Ptsql);

            foreach($Pt as $v){
                $ptid[] = $v['felgptid'];
            }
            $ptids = join(',',$ptid);


            //根据产品id查询出对应的产品名称
            $PtNameSelect = $language."ftname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_felgproduct where $PtNameWhere";
            $PtName = $felgptmmdown -> query($PtNameSql);


            //加载更多
            $coountWhere = $language."felghzname = '".$hzname."'";
            $sqlcount ="select count(*) as count from qw_felgptmmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $felgproduct->query($sqlcount);
            //print_r($icount[0]['count']);exit;

            //查询文档下载总数
            $downptCount = $icount[0]['count'];

            //定义每次显示产品条数
            $row = 8;

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

            //根据频率查找出所有的下载文档
            $PtDocSelect = $language."mmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."felghzname = '".$hzname."'";
            $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere limit $offset,$row";
            $PtDoc = $felgptmmdown -> query($PtDocSql);

            //产品类型
            $data['type'] = $Type;
            //产品名称
            $data['ptname'] = $PtName;
            //频率所有文档
            $data['ptdoc'] = $PtDoc;
            $ptall = 7;
            $data['ptall'] = $ptall;



        }





        echo json_encode($data);

    }


    public function jiazaiyis(){

       //判断当前语言
        $language = L('language');
        $this->assign('language',$language);

        //felg密码下载
        $felgptmmdown = M('felgptmmdown');
        //felg产品表
        $felgproduct = M('felgproduct');

        //频率名称
        $hzname = $_POST['hzname'];
        //传递的页数
        $p = $_POST['p'];

        //定义每次显示产品条数
        $row = 8;

         //第一次加载更多
        $coountWhere = $language."felghzname = '".$hzname."'";
        $sqlcount ="select count(*) as count from qw_felgptmmdown where ".$coountWhere;
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


        //根据频率查找出所有的下载文档
        $PtDocSelect = $language."mmdownname as docname,({$_count}) as count,".$language."mmdown as docurl";
        $PtDocWhere = $language."felghzname = '".$hzname."'";
        $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere limit $offset,$row";

        $PtDoc = $felgptmmdown -> query($PtDocSql);

   //print_r($PtDoc);exit;

        //频率所有文档
        $data['ptdoc'] = $PtDoc;


        echo json_encode($data);

    }


   public function jiazaitype(){

       //判断当前语言
        $language = L('language');
        $this->assign('language',$language);

        //felg密码下载
        $felgptmmdown = M('felgptmmdown');
        //felg产品表
        $felgproduct = M('felgproduct');

        //频率名称
        $hzname = $_POST['hzname'];
        //类型名称
        $typename = $_POST['typename'];
        //传递的页数
        $p = $_POST['p'];

         //加载更多
            $coountWhere = $language."felghzname = '".$hzname."' and ".$language."felgtypename ='".$typename."'";
            $sqlcount ="select count(*) as count from qw_felgptmmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $felgproduct->query($sqlcount);
            //print_r($icount[0]['count']);exit;

            //查询文档下载总数
            $downptCount = $icount[0]['count'];

            //定义每次显示产品条数
            $row = 8;

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



            //根据频率查找出所有的下载文档
            $PtDocSelect = $language."mmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."felghzname = '".$hzname."' and ".$language."felgtypename ='".$typename."'";
            $PtDocSql = "select $PtDocSelect from qw_felgptmmdown where $PtDocWhere limit $offset,$row";
 //print_r($PtDocSql);exit;
            $PtDoc = $felgptmmdown -> query($PtDocSql);



        //频率所有文档
        $data['ptdoc'] = $PtDoc;



        echo json_encode($data);
        exit;

    }





}