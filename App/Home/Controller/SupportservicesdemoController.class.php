<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class SupportservicesdemoController extends ComController {

    public function index(){

        //判断当前语言
		$language = L('language');
		$this->assign('language',$language);

        //产品验证码下载筛选
        $rflinkermmdown = M('rflinkermmdown');
        $rflinkerproduct = M('rflinkerproduct');

        //第一次加载的频率
        $HzSelect = "distinct ".$language."rrhzname as rrhzname";
        $Hzsql = "select $HzSelect from qw_rflinkermmdown order by mmdownsort";
        $Hz = $rflinkermmdown -> query($Hzsql);
        $this -> assign('Hz',$Hz);


        //找出第一个频率下的所有类型,产品名称,文档下载
        //频率的第一个类型
        $YiHzName = $Hz[0]['rrhzname'];
        $this -> assign('YiHzName',$YiHzName);



        //查询出第一个频率的所有类型
        $TypeSelect = "distinct ".$language."rrtypename as rrtypename";
        $TypeWhere = $language."rrhzname = '".$YiHzName."'";
        $Typesql = "select $TypeSelect from qw_rflinkermmdown where $TypeWhere";
        $Type = $rflinkermmdown -> query($Typesql);
        $this -> assign('Type',$Type);


        //查询出第一个频率的所有产品名称
        //产品id
        $PtSelect = "rrptid as rrptid";
        $PtWhere = $language."rrhzname = '".$YiHzName."'";
        $Ptsql = "select $PtSelect from qw_rflinkermmdown where $PtWhere";
        $Pt = $rflinkermmdown -> query($Ptsql);



        foreach($Pt as $v){
            $ptid[] = $v['rrptid'];
        }
        $ptids = join(',',$ptid);
        //print_r($ptids);exit;


        //根据产品id查询出对应的产品名称
        if(!empty($ptids)){
            $PtNameSelect = $language."rrname as rrname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_rflinkerproduct where $PtNameWhere";
            $PtName = $rflinkerproduct -> query($PtNameSql);
        }



        //根据第一个频率查找出所有的下载文档
        $PtDocSelect = $language."rrmmdownname as docname,".$language."mmdown as docurl";
        $PtDocWhere = $language."rrhzname = '".$YiHzName."'";
        $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere limit 0,8";
        $PtDoc = $rflinkermmdown -> query($PtDocSql);
        $this -> assign('PtDoc',$PtDoc);
        $this -> assign('PtName',$PtName);


        //第一次加载更多
        $coountWhere = $language."rrhzname = '".$YiHzName."'";
        $sqlcount ="select count(*) as count from qw_rflinkermmdown where ".$coountWhere;
        //查询出符合当前频率的产品有多少
        $icount = $rflinkermmdown->query($sqlcount);
        $icount = $icount[0]['count'];

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

        //产品验证码下载筛选
        $rflinkermmdown = M('rflinkermmdown');
        $rflinkerproduct = M('rflinkerproduct');


        //频率名称
        $hzname = $_POST['hzname'];
        //产品名称
        $typename = $_POST['typename'];
        //文档下载名称
        $ptname = $_POST['ptname'];




        //频率
        if(empty($typename) and empty($ptname)){

            //查询出对应的类型
            $TypeSelect = "distinct ".$language."rrtypename as typename";
            $TypeWhere = $language."rrhzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_rflinkermmdown where $TypeWhere order by mmdownsort";
            $Type = $rflinkermmdown -> query($Typesql);


            //加载更多
            $coountWhere = $language."rrhzname = '".$hzname."'";
            $sqlcount ="select count(*) as count from qw_rflinkermmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $rflinkerproduct->query($sqlcount);


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
            $PtSelect = "rrptid as rrptid";
            $PtWhere = $language."rrhzname = '".$hzname."'";
            $Ptsql = "select $PtSelect from qw_rflinkermmdown where $PtWhere order by mmdownsort";
            $Pt = $rflinkermmdown -> query($Ptsql);


            foreach($Pt as $v){
                $ptid[] = $v['rrptid'];
            }
            $ptids = join(',',$ptid);


            //根据产品id查询出对应的产品名称
            $PtNameSelect = $language."rrname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_rflinkerproduct where $PtNameWhere";
            $PtName = $rflinkerproduct -> query($PtNameSql);


            //根据频率查找出所有的下载文档
            $PtDocSelect = $language."rrmmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."rrhzname = '".$hzname."'";
            $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere limit $offset,$row";
            $PtDoc = $rflinkermmdown -> query($PtDocSql);




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
            $TypeSelect = "distinct ".$language."rrtypename as typename";
            $TypeWhere = $language."rrhzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_rflinkermmdown where $TypeWhere order by mmdownsort";
            $Type = $rflinkermmdown -> query($Typesql);



            //查询出对应的产品
            //根据频率查询出产品id
            $PtSelect = "rrptid as rrptid";
            $PtWhere = $language."rrhzname = '".$hzname."'";
            $Ptsql = "select $PtSelect from qw_rflinkermmdown where $PtWhere order by mmdownsort";
            $Pt = $rflinkermmdown -> query($Ptsql);


            foreach($Pt as $v){
                $ptid[] = $v['rrptid'];
            }
            $ptids = join(',',$ptid);

             //根据产品id查询出对应的产品名称
            $PtNameSelect = $language."rrname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_rflinkerproduct where $PtNameWhere";
            $PtName = $rflinkerproduct -> query($PtNameSql);



            //加载更多
            $coountWhere = $language."rrhzname = '".$hzname."' and ".$language."rrtypename ='".$typename."'";
            $sqlcount ="select count(*) as count from qw_rflinkermmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $rflinkerproduct->query($sqlcount);


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
            $PtDocSelect = $language."rrmmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."rrhzname = '".$hzname."' and ".$language."rrtypename ='".$typename."'";
            $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere limit $offset,$row";


            $PtDoc = $rflinkermmdown -> query($PtDocSql);


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
            $TypeSelect = "distinct ".$language."rrtypename as typename";
            $TypeWhere = $language."rrhzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_rflinkermmdown where $TypeWhere order by mmdownsort";
            $Type = $rflinkermmdown -> query($Typesql);


            //查询出对应的产品
            //根据频率查询出产品id
            $PtSelect = "rrptid as rrptid";
            $PtWhere = $language."rrhzname = '".$hzname."'";
            $Ptsql = "select $PtSelect from qw_rflinkermmdown where $PtWhere order by mmdownsort";
            $Pt = $rflinkermmdown -> query($Ptsql);

            foreach($Pt as $v){
                $ptid[] = $v['rrptid'];
            }
            $ptids = join(',',$ptid);


            //根据产品id查询出对应的产品名称
            $PtNameSelect = $language."rrname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_rflinkerproduct where $PtNameWhere";
            $PtName = $rflinkerproduct -> query($PtNameSql);


            //加载更多
            $coountWhere = $language."rrhzname = '".$hzname."'";
            $sqlcount ="select count(*) as count from qw_rflinkermmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $rflinkerproduct->query($sqlcount);

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
            $PtDocSelect = $language."rrmmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."rrhzname = '".$hzname."'";
            $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere limit $offset,$row";
            $PtDoc = $rflinkermmdown -> query($PtDocSql);

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
                $PtIdWhere = $language."rrname = '".$ptname."'";
                $PtIdSql = "select $PtIdSelect from qw_rflinkerproduct where $PtIdWhere";
                $PtId = $rflinkerproduct -> query($PtIdSql);

                foreach($PtId as $v){
                    $ptid = $v['id'];
                }


                //根据频率查找出所有的下载文档
                $PtDocSelect = $language."rrmmdownname as docname,".$language."mmdown as docurl";
                $PtDocWhere = $language."rrhzname = '".$hzname."' and rrptid = $ptid ";
                $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere";

                $PtDoc = $rflinkermmdown -> query($PtDocSql);



                //根据频率、id查出对应的类型
                $TypeSelect = "distinct ".$language."rrtypename as typename";
                $TypeWhere = $language."rrhzname = '".$hzname."' and rrptid = ".$ptid;
                $Typesql = "select $TypeSelect from qw_rflinkermmdown where $TypeWhere order by mmdownsort";
                $Type = $rflinkermmdown -> query($Typesql);


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
            $TypeSelect = "distinct ".$language."rrtypename as typename";
            $TypeWhere = $language."rrhzname = '".$hzname."'";
            $Typesql = "select $TypeSelect from qw_rflinkermmdown where $TypeWhere order by mmdownsort";
            $Type = $rflinkermmdown -> query($Typesql);


            //查询出对应的产品
            //根据频率查询出产品id
            $PtSelect = "rrptid as rrptid";
            $PtWhere = $language."rrhzname = '".$hzname."'";
            $Ptsql = "select $PtSelect from qw_rflinkermmdown where $PtWhere order by mmdownsort";
            $Pt = $rflinkermmdown -> query($Ptsql);


            foreach($Pt as $v){
                $ptid[] = $v['rrptid'];
            }
            $ptids = join(',',$ptid);

             //根据产品id查询出对应的产品名称
            $PtNameSelect = $language."rrname as ftname";
            $PtNameWhere = "id in($ptids)";
            $PtNameSql = "select $PtNameSelect from qw_rflinkerproduct where $PtNameWhere";
            $PtName = $rflinkerproduct -> query($PtNameSql);


             //加载更多
            $coountWhere = $language."rrhzname = '".$hzname."'";
            $sqlcount ="select count(*) as count from qw_rflinkermmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $rflinkerproduct->query($sqlcount);


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
            $PtDocSelect = $language."rrmmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."rrhzname = '".$hzname."'";
            $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere limit $offset,$row";
            $PtDoc = $rflinkermmdown -> query($PtDocSql);

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

        //产品验证码下载筛选
        $rflinkermmdown = M('rflinkermmdown');
        $rflinkerproduct = M('rflinkerproduct');

        //频率名称
        $hzname = $_POST['hzname'];
        //传递的页数
        $p = $_POST['p'];

        //定义每次显示产品条数
        $row = 8;

        //第一次加载更多
        $coountWhere = $language."rrhzname = '".$hzname."'";
        $sqlcount ="select count(*) as count from qw_rflinkermmdown where ".$coountWhere;
        //查询出符合当前频率的产品有多少
        $icount = $rflinkermmdown->query($sqlcount);



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
        $PtDocSelect = $language."rrmmdownname as docname,".$language."mmdown as docurl";
        $PtDocWhere = $language."rrhzname = '".$hzname."'";
        $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere limit $offset,$row";
        $PtDoc = $rflinkermmdown -> query($PtDocSql);

        //频率所有文档
        $data['ptdoc'] = $PtDoc;


        echo json_encode($data);

    }


   public function jiazaitype(){

        //判断当前语言
        $language = L('language');
        $this->assign('language',$language);

        //产品验证码下载筛选
        $rflinkermmdown = M('rflinkermmdown');
        $rflinkerproduct = M('rflinkerproduct');

        //频率名称
        $hzname = $_POST['hzname'];
        //类型名称
        $typename = $_POST['typename'];
        //传递的页数
        $p = $_POST['p'];


             //加载更多
            $coountWhere = $language."rrhzname = '".$hzname."' and ".$language."rrtypename ='".$typename."'";
            $sqlcount ="select count(*) as count from qw_rflinkermmdown where ".$coountWhere;
            //查询出符合当前频率的产品有多少
            $icount = $rflinkerproduct->query($sqlcount);

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
            $PtDocSelect = $language."rrmmdownname as docname,({$downptCount}) as count,".$language."mmdown as docurl";
            $PtDocWhere = $language."rrhzname = '".$hzname."'";
            $PtDocSql = "select $PtDocSelect from qw_rflinkermmdown where $PtDocWhere limit $offset,$row";
            $PtDoc = $rflinkermmdown -> query($PtDocSql);



        //频率所有文档
        $data['ptdoc'] = $PtDoc;



        echo json_encode($data);
        exit;

    }





}