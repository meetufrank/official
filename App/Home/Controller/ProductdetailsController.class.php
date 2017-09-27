<?php

namespace Home\Controller;
use Think\Controller;
use Vendor\Page;
class ProductdetailsController extends ComController {
    public function index(){



        //判断当前语言
		$language = L('language');
		$languages = L('languages');
		$this->assign('language',$language);

	    //id 产品id
		$id = $_REQUEST['id'];

		//判断类型 1 FELG   2  RFLINKER
		$type = isset($_REQUEST['type'])?$_REQUEST['type']:false;

		if($type == 1){
				$where = "id =".$id;
				$a = "felg".$languages."hzname";
				//print_r($a);exit;

				//felg产品详情
				//ftname 产品名称  fttitle 标题 ftspec 规格  ftimg 图片
				$felgproduct = M('felgproduct');
				$selectfelg="id,felg".$languages."hzname as hzname,"."felg".$languages."typename  as typename ,".$language."ftname as ftname,".$language."fttitle as fttitle,".$language."ftimg as ftimg,".$language."ftspec as ftspec,ftsort";
				$felgxiangqing = $felgproduct->where($where)->order('ftsort')->field($selectfelg)->find();
				$this->assign('felgxiangqing',$felgxiangqing);
				//print_r($felgxiangqing);exit;
				//felg匹配的产品
				$mwhere = "fuid =".$id;
				$mselect = "f.id,".$language."ftname as ftname,".$language."fttitle as fttitle,".$language."ftimg as ftimg";

				$matching=M('matching');
				$on = "f.".$language."ftname = m.".$language."mgname";

				$mfelg=$felgproduct->table('__FELGPRODUCT__ f')->join("
						__MATCHING__ m on $on
					   ")
					 -> where($mwhere)->field($mselect)->select();


                //判断产品匹配是否为空，为空则隐藏
                if (count($mfelg) == 0) {
                	$yc = 1;
                	$this->assign('yingchang',$yc);
                }
					//print_r($mfelg);exit;
				$this->assign('mfelg',$mfelg);

			    //felg产品下载
				$felgptdown = M('felgptdown');
				$felgptdnwhere = "felgptid = ".$id;
				$felgptdngf = $language."downname as downname,".$language."down as down,downsort";
				$felgptdowns = $felgptdown ->where($felgptdnwhere)->order('downsort')->getField($felgptdngf);
				$this -> assign('felgptdowns',$felgptdowns);
				//print_r($felgptdowns);exit;
		}else if($type == 2){
			    $where = "id =".$id;

				//rflinker产品详情
				$rflinkerproduct = M('rflinkerproduct');
				$selectfelg="id,rflinker".$languages."hzname as hzname,"."rflinker".$languages."typename  as typename ,"
				.$language."rrname as ftname,".$language."rrtitle as fttitle,"
				.$language."rrimg as ftimg,".$language."rrspec as ftspec,rrsort";
				$felgxiangqing = $rflinkerproduct->where($where)->order('rrsort')->field($selectfelg)->find();
				$this->assign('felgxiangqing',$felgxiangqing);
				//print_r($felgxiangqing);exit;



				//rflinker匹配的产品
				$mwhere = "rflinkerid =".$id;
				$mselect = "f.id ,f.".$language."rrname as ftname ,f.".$language."rrtitle as fttitle,f.".$language."rrimg as ftimg";

				$rflinkermatching=M('rflinkermatching');
				$on = "f.".$language."rrname = m.".$language."rrname";

				$mfelg=$rflinkerproduct->table('__RFLINKERPRODUCT__ f')->join("
						__RFLINKERMATCHING__ m on $on
					   ")
					 -> where($mwhere)->field($mselect)->select();
				$this->assign('mfelg',$mfelg);

				 //判断产品匹配是否为空，为空则隐藏
                if (count($mfelg) == 0) {
                	$yc = 1;
                	$this->assign('yingchang',$yc);
                }

				//print_r($mfelg);exit;



				 //产品下载
				$rfinkerdown = M('rfinkerdown');
				$felgptdnwhere = "rrfuid = ".$id;
				$felgptdngf = $language."downname as downname,".$language."down as down,downsort";
				$felgptdowns = $rfinkerdown ->where($felgptdnwhere)->order('downsort')->getField($felgptdngf);
				$this -> assign('felgptdowns',$felgptdowns);
				//print_r($felgptdowns);exit;

		}


		$this -> display();

    }









}