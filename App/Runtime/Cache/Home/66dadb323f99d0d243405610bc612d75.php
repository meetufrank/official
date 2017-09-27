<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title><?php echo (L("supporting_details")); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond./zhanggw/Public/qiantai/js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/css/animate.css">
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/css/style.css?id=1">
  <!-- new css by wys -->
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/css/new.css">
  <link rel="stylesheet" type="text/css" href="/zhanggw/Public/qiantai/Swiper-3.4.2/dist/css/swiper.css">
  <!-- Swiper styles -->
    <style>

     @media (max-width:768px) {
      .swiper-container {
        height:200px;
      }

     .swiper-slide-01{
        background-image:url(/zhanggw/Public/qiantai/images/about-us.jpg);
     }

    }
    @media (min-width:768px) {
      .swiper-container {
        height:600px;
      }

             .swiper-slide-01{
              background-image:url(/zhanggw/Public/qiantai/images/about-us.jpg);
            }


    }

    html, body {
        position: relative;
    }
    body {
        margin: 0;
        padding: 0;
    }
    .swiper-container {
        max-width: 100%;
    }
    .swiper-slide {
        background-position: center;
        background-size:100% 100%;
    }
    </style>
</head>
<body>
 <!-- Header -->
<header id="topnav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div id="logo">
          <a class="navbar-brand" href="<?php echo U('Index/Index');?>"><img src="/zhanggw/Public/qiantai/images/logo.png" alt=""></a>
        </div>
      </div>
      <div class="hidden-xs">
        <ul class="nav navbar-nav">

		  <!-- CONTROLLER_NAME -->
          <li><a href="<?php echo U('Index/Index?lang=ch-cn');?>"  id="china">中文  </a></li>
          <li><a href="#">丨</a></li>
          <li><a href="<?php echo U('Index/Index?lang=en-us');?>"   id="english">EN</a></li>
        </ul>
      </div>

	    <script>
	  window.__arr__=<?php echo ($new_live); ?>;
	  window.__arr2__=<?php echo ($new_live_all); ?>;
	  </script>

      <form class="navbar-form navbar-left">
          <div class="form-group">
              <input type="text" id="arrcity" class="form-control" value="Press enter to search">
              <div id='suggest' class="ac_results">

			  </div>
          </div>
      </form>



      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav" id="nav">

          <li class="visible-xs"><a href="<?php echo U('?lang=ch-cn');?>" id="mobilechina" style="display:inline-block">中文</a>丨<a href="<?php echo U('?lang=en-us');?>" id="mobileenglish" style="display:inline-block">EN</a></li>


          <li><a href="<?php echo U('Index/Index');?>" <?php if($style_change == Index): ?>class="hbgcolor"<?php endif; ?> ><?php echo (L("head_index")); ?></a></li>
          <li><a href="<?php echo U('Feig/Index');?>" <?php if($style_change == Feig OR $style_change == Rflinker): ?>class="hbgcolor"<?php endif; ?>><?php echo (L("head_product")); ?></a></li>
          <li><a href="<?php echo U('Vocationlist/Index');?>" <?php if($style_change == Vocationlist): ?>class="hbgcolor"<?php endif; ?>><?php echo (L("head_Industry")); ?></a></li>
          <li><a href="<?php echo U('Codeinput/Index');?>" <?php if($style_change == Codeinput OR $style_change == Supportservices): ?>class="hbgcolor"<?php endif; ?>><?php echo (L("head_support")); ?></a></li>
          <li><a href="<?php echo U('Aboutus/Index');?>" <?php if($style_change == Aboutus): ?>class="hbgcolor"<?php endif; ?>><?php echo (L("head_about")); ?></a></li>
        </ul>
      </div>
    </div>
  </header>


  <!-- End Header -->

  <!-- Preloader -->
  <div id="mask">
    <div class="spinner">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>
  </div>
  <!-- End Preloader -->
<div class="scrollable" id="scrollable">
  <!-- Swiper -->

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide-01"></div>
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination swiper-pagination-white"></div> -->

    </div>
<!-- 下载详情 -->
<section id="portfolio" class="product-list-section">
   <!--  <div class="productlist-section-title">
        <a href="#" class="product-a"><span class="product-header-class cdk-class-one" style="background-color: #02AAF1;color: black">FEIG</span></a>
        <a href="<?php echo U('Supportservicesdemo/Index');?>" class="product-a"><span class="product-header-class cdk-class-two" style="    background-color: rgb(238,238,238);color: black">Rflinker</span></a>
        <div style="clear: both;"></div>
    </div> -->
    <!-- Frequency -->
    <!-- <div class="nav-section-title nac-feig-title">
      <p class="product-p-border">Frequency</p>
        <ul id="filters" class="nav">
            <?php if(is_array($Hz)): $i = 0; $__LIST__ = $Hz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="docdwon('<?php echo ($vo["hzname"]); ?>')" class="filter hzclass <?php if($i == 1): ?>active<?php endif; ?>" id="filter<?php echo ($vo['hzname']); ?>" data-filter="lf"><?php echo ($vo["hzname"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div> -->

    <!-- Type -->
   <!--  <div class="nav-section-title nac-feig-title">
      <p class="product-p-border">Type</p>
      <ul id="filter_s" class="nav">
         <li class="filter active typeclass"  onclick="docdwon('<?php echo ($YiHzName); ?>','typeall')" data-filter="graphic">All</li>
         <?php if(is_array($Type)): $i = 0; $__LIST__ = $Type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="filter typeclass" id="type<?php echo ($vo['typename']); ?>" onclick="docdwon('<?php echo ($YiHzName); ?>','<?php echo ($vo['typename']); ?>')" data-filter="<?php echo ($vo["typename"]); ?>"><?php echo ($vo["typename"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div> -->

    <!-- Apellation -->
    <!-- <div class="nav-section-title nac-feig-title">
      <p class="product-p-border">Apellation</p>
      <ul id="filter_ss" class="nav">
          <li class="filter active ptclass" id="ptAll" data-filter="one" onclick="docdwon('<?php echo ($YiHzName); ?>','7','ptall')">All</li>
          <?php if(is_array($PtName)): $i = 0; $__LIST__ = $PtName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="filter ptclass" data-filter="<?php echo ($vo["ftname"]); ?>" onclick="docdwon('<?php echo ($YiHzName); ?>','6','<?php echo ($vo['ftname']); ?>')"><?php echo ($vo["ftname"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div> -->


    <!-- 文档下载 -->
    <ul id="works-list" class="nav">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-info-download"><h4><?php echo ($vo["downname"]); ?></h4>
             <a target="_blank"  href="/zhanggw/Public/Uploads/<?php echo ($vo["down"]); ?>"><button type="button"  class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a>
             </div></div></li></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>


   <!--  <?php if($icount > 8 ): ?><div id="jzgd" onclick="jiazaiyi('<?php echo ($YiHzName); ?>')" class="section-title">
             <h2>More</h2>
        </div>
    <?php else: endif; ?> -->


  </section>
  <footer>
    <div class="container">
      <div class="col-lg-2 col-md-2 col-xs-12 footer-icons">
        <ul class="social">
          <li><a href="#" id="facebook"><i class="fa fa-weixin"></i></a></li>
        <!--   <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-weibo"></i></a></li>
          <li><a href="#"><i class="fa fa-weixin"></i></a></li> -->
        </ul>
      </div>
      <div class="col-lg-10 col-md-10 col-xs-12 footer-main">
        <div class="col-lg-3 col-md-3 col-xs-12">
          <h5><?php echo (L("addressname")); ?>:<?php echo (L("bottom_address")); ?></h5>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12">
          <h5><?php echo (L("telname")); ?>:13918999394</h5>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <h5><?php echo (L("emailname")); ?>:13918999394@163.com</h5>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-12">
          <h5 class="footer-right"><a style="color:white" href="http://www.miitbeian.gov.cn/"><?php echo (L("ICPname")); ?></a></h5>
        </div>
      </div>
    </div>
  </footer>

<script type='text/javascript'>
    (function(m, ei, q, i, a, j, s) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        j = ei.createElement(q),
            s = ei.getElementsByTagName(q)[0];
        j.async = true;
        j.charset = 'UTF-8';
        j.src = '//static.meiqia.com/dist/meiqia.js';
        s.parentNode.insertBefore(j, s);
    })(window, document, 'script', '_MEIQIA');
    _MEIQIA('entId', 51671);
</script>






</div>
<!-- Scripts -->
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/jquery.min.js"></script>
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/flexslider.js"></script>
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/owl.carousel.js"></script>
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/jquery.appear.js"></script>
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/mixitup.js"></script>
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/jquery.validation.js"></script>
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/jquery.parallax-1.1.3.js"></script>

<!-- Main JS File -->
<script type="text/javascript" src="/zhanggw/Public/qiantai/js/main.js"></script>
<!--下拉搜索JS-->
<script src="/zhanggw/Public/qiantai/js/aircity.js"></script>
<!--swiper-->
<script src="/zhanggw/Public/qiantai/Swiper-3.4.2/dist/js/swiper.min.js"></script>
<script src="/zhanggw/Public/qiantai/layer/mobile/layer.js"></script>
<script>
$("#facebook").click(function(){
  var mycontent='<img src="/zhanggw/Public/qiantai/images/erweima.jpg">';
  layer.open({
    style: 'border:none;width:auto;height:auto;padding:0px 0px;',
    content:mycontent
  });
  $(".layui-m-layercont").css({ padding: "0px 0px" });
});
</script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
    });
</script>


<script>


        //下载筛选
        function docdwon(hzname,typename,ptname){


            //频率名称
            $hzname = hzname;
            //类型名称
            $typename = typename;
            //产品名称
            $ptname = ptname;

            $.ajax({
                      type:"post",
                      url:"/zhanggw/index.php/Home/Supportservices/docdwons",
                      dataType:"json",
                      data:{hzname:$hzname,typename:$typename,ptname:$ptname},
                      success:function(data){

                            console.log(data);

                            //频率
                            if(data.hz == 1){
                                //频率选中样式
                                $('#filter'+hzname).addClass('active').siblings().removeClass('active');


                                //把类型div元素删除
                                $('#filter_s').empty();
                                //频率下的所有类型
                                var html = '<li class="filter active typeclass" id="typeAll"  onclick="docdwon(\''+hzname+'\',\'typeall\')" data-filter="typeall">All</li>';
                                $.each(data.type,function(i) {
                                     html += '<li class="filter type typeclass" id="type'+data.type[i].typename+'" onclick="docdwon(\''+hzname+'\',\''+data.type[i].typename+'\')" data-filter="graphic">'+data.type[i].typename+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_s').append(html);



                                //把产品名称div元素删除
                                $('#filter_ss').empty();
                                var htmlptname = '<li class="filter active ptclass" id="ptAll" data-filter="ones" onclick="docdwon(\''+hzname+'\',\'7\',\'ptall\')">All</li>';
                                $.each(data.ptname,function(i){

                                    htmlptname += '<li class="filter ptclass"  data-filter="\'+data.ptname[i].ftname+\'" onclick="docdwon(\''+hzname+'\',\'6\',\''+data.ptname[i].ftname+'\')">'+data.ptname[i].ftname+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_ss').append(htmlptname);


                                //根据频率查找出所有的下载文档
                                $('#works-list').empty();
                                //清除文档下载ul的style
                                $('#works-list').removeAttr("style");
                                //下载id删除
                                $('#jzgd').empty();



                                var htmlptdoc = '';
                                var count = 0;
                                $.each(data.ptdoc,function(i){
                                  htmlptdoc += '<a></a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><a></a><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><a></a><div class="team-info-download"><a><h4>'+data.ptdoc[i].docname+'</h4></a><a target="_blank" href="/zhanggw/Public/Uploads/'+data.ptdoc[i].docurl+'"><button type="button" class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a></div></div></li>';
                                      count = data.ptdoc[i].count;
                                });
                                //alert(count);
                                if(count > 8){

                                          $("#works-list").after('<div id="jzgd" onclick="jiazaiyi(\''+hzname+'\')" class="section-title"><h2>More</h2></div>');
                                }

                                //循环完参数后赋值给容器
                                $('#works-list').append(htmlptdoc);




                                //类型点击1.加上样式

                                 $(".typeclass").click(function(){
                                           $(".typeclass").removeClass("active");
                                           $(this).addClass("active");

                                 });


                                 $(".ptclass").click(function(){
                                           $(".ptclass").removeClass("active");
                                           $(this).addClass("active");

                                 });

                            }

                            //类型筛选
                            if(data.types == 2){

                                //频率选中样式
                                $('#filter'+hzname).addClass('active').siblings().removeClass('active');



                                //把产品名称div元素删除
                                $('#filter_ss').empty();
                                var htmlptname = '<li class="filter active ptclass" id="ptAll" data-filter="ones" onclick="docdwon(\''+hzname+'\',\'7\',\'ptall\')">All</li>';
                                $.each(data.ptname,function(i){
                                    htmlptname += '<li class="filter ptclass"  data-filter="\+data.ptname[i].ftname+\'" onclick="docdwon(\''+hzname+'\',\'6\',\''+data.ptname[i].ftname+'\')">'+data.ptname[i].ftname+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_ss').append(htmlptname);

                                 //类型点击1.加上样式

                                 $(".typeclass").click(function(){
                                           $(".typeclass").removeClass("active");
                                           $(this).addClass("active");

                                 });



                                //根据频率查找出所有的下载文档
                                $('#works-list').empty();
                                //清除文档下载ul的style
                                $('#works-list').removeAttr("style");
                                //下载id删除
                                $('#jzgd').empty();
                                var htmlptdoc = '';
                                $.each(data.ptdoc,function(i){
                                  htmlptdoc += '<a></a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><a></a><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><a></a><div class="team-info-download"><a><h4>'+data.ptdoc[i].docname+'</h4></a><a target="_blank" href="/zhanggw/Public/Uploads/'+data.ptdoc[i].docurl+'"><button type="button" class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a></div></div></li>';
                                    count = data.ptdoc[i].count;
                                });
                                if(count > 8){
                                          $("#works-list").after('<div id="jzgd" onclick="jiazaitype(\''+hzname+'\',\''+typename+'\')" class="section-title"><h2>More</h2></div>');
                                }
                                //循环完参数后赋值给容器
                                $('#works-list').append(htmlptdoc);





                                 $(".ptclass").click(function(){
                                           $(".ptclass").removeClass("active");
                                           $(this).addClass("active");

                                 });


                            }



                            //类型All
                            if(data.hz == 21){
                                //频率选中样式
                                $('#filter'+hzname).addClass('active').siblings().removeClass('active');



                                //把类型div元素删除
                                $('#filter_s').empty();
                                //频率下的所有类型
                                var html = '<li class="filter active typeclass" id="typeAll"  onclick="docdwon(\''+hzname+'\',\'typeall\')" data-filter="typeallsd">All</li>';
                                $.each(data.type,function(i) {
                                     html += '<li class="filter type typeclass" id="type'+data.type[i].typename+'" onclick="docdwon(\''+hzname+'\',\''+data.type[i].typename+'\')" data-filter="'+data.type[i].typename+'">'+data.type[i].typename+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_s').append(html);



                                //把产品名称div元素删除
                                $('#filter_ss').empty();
                                var htmlptname = '<li class="filter active ptclass" id="ptAll" data-filter="one" onclick="docdwon(\''+hzname+'\',\'7\',\'ptall\')">All</li>';
                                $.each(data.ptname,function(i){

                                    htmlptname += '<li class="filter ptclass"  data-filter="one" onclick="docdwon(\''+hzname+'\',\'6\',\''+data.ptname[i].ftname+'\')">'+data.ptname[i].ftname+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_ss').append(htmlptname);


                                //根据频率查找出所有的下载文档
                                $('#works-list').empty();
                                //清除文档下载ul的style
                                $('#works-list').removeAttr("style");
                                //下载id删除
                                $('#jzgd').empty();

                                var htmlptdoc = '';
                                $.each(data.ptdoc,function(i){
                                  htmlptdoc += '<a></a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><a></a><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><a></a><div class="team-info-download"><a><h4>'+data.ptdoc[i].docname+'</h4></a><a target="_blank" href="/zhanggw/Public/Uploads/'+data.ptdoc[i].docurl+'"><button type="button" class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a></div></div></li>';
                                    count = data.ptdoc[i].count;
                                });

                                if(count > 8){

                                          $("#works-list").after('<div id="jzgd" onclick="jiazaiyi(\''+hzname+'\')" class="section-title"><h2>More</h2></div>');
                                }


                                //循环完参数后赋值给容器
                                $('#works-list').append(htmlptdoc);


                                 $(".typeclass").click(function(){
                                           $(".typeclass").removeClass("active");
                                           $(this).addClass("active");

                                 });

                                 $(".ptclass").click(function(){
                                           $(".ptclass").removeClass("active");
                                           $(this).addClass("active");

                                 });

                            }


                            //产品名称筛选
                            if(data.pts == 3){
                                 //频率选中样式
                                $('#filter'+hzname).addClass('active').siblings().removeClass('active');



                                //把类型div元素删除
                                $('#filter_s').empty();
                                //频率下的所有类型
                                var html = '<li class="filter active typeclass" id="typeAll"  onclick="docdwon(\''+hzname+'\',\'typeall\')" data-filter="typeallsdsss">All</li>';
                                $.each(data.type,function(i) {
                                     html += '<li class="filter type active typeclass" id="type'+data.type[i].typename+'" onclick="docdwon(\''+hzname+'\',\''+data.type[i].typename+'\')" data-filter="'+data.type[i].typename+'">'+data.type[i].typename+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_s').append(html);
                                $("#typeAll").removeClass("active");
                                $(".typeclass").click(function(){
                                           $(".typeclass").removeClass("active");
                                           $(this).addClass("active");

                                 });




                                //根据频率查找出所有的下载文档
                                $('#works-list').empty();
                                //清除文档下载ul的style
                                $('#works-list').removeAttr("style");
                                //下载id删除
                                $('#jzgd').empty();
                                var htmlptdoc = '';
                                $.each(data.ptdoc,function(i){
                                  htmlptdoc += '<a></a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><a></a><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><a></a><div class="team-info-download"><a><h4>'+data.ptdoc[i].docname+'</h4></a><a target="_blank" href="/zhanggw/Public/Uploads/'+data.ptdoc[i].docurl+'"><button type="button" class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a></div></div></li>';
                                });
                                //循环完参数后赋值给容器
                                $('#works-list').append(htmlptdoc);





                                 $(".ptclass").click(function(){
                                           $(".ptclass").removeClass("active");
                                           $(this).addClass("active");

                                 });


                            }


                             //频率All
                            if(data.ptall == 7){
                                //频率选中样式
                                $('#filter'+hzname).addClass('active').siblings().removeClass('active');


                                //把类型div元素删除
                                $('#filter_s').empty();
                                //频率下的所有类型
                                var html = '<li class="filter active typeclass" id="typeAll"  onclick="docdwon(\''+hzname+'\',\'typeall\')" data-filter="typeall">All</li>';
                                $.each(data.type,function(i) {
                                     html += '<li class="filter type typeclass" id="type'+data.type[i].typename+'" onclick="docdwon(\''+hzname+'\',\''+data.type[i].typename+'\')" data-filter="graphic">'+data.type[i].typename+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_s').append(html);



                                //把产品名称div元素删除
                                $('#filter_ss').empty();
                                var htmlptname = '<li class="filter active ptclass" id="ptAll" data-filter="ones" onclick="docdwon(\''+hzname+'\',\'7\',\'ptall\')">All</li>';
                                $.each(data.ptname,function(i){

                                    htmlptname += '<li class="filter ptclass"  data-filter="\'+data.ptname[i].ftname+\'" onclick="docdwon(\''+hzname+'\',\'6\',\''+data.ptname[i].ftname+'\')">'+data.ptname[i].ftname+'</li>';
                                });
                                //循环完参数后赋值给容器
                                $('#filter_ss').append(htmlptname);


                                //根据频率查找出所有的下载文档
                                $('#works-list').empty();
                                //清除文档下载ul的style
                                $('#works-list').removeAttr("style");
                                //下载id删除
                                $('#jzgd').empty();
                                var htmlptdoc = '';
                                $.each(data.ptdoc,function(i){
                                  htmlptdoc += '<a></a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><a></a><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><a></a><div class="team-info-download"><a><h4>'+data.ptdoc[i].docname+'</h4></a><a target="_blank" href="/zhanggw/Public/Uploads/'+data.ptdoc[i].docurl+'"><button type="button" class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a></div></div></li>';
                                    count = data.ptdoc[i].count;
                                });
                                if(count > 8){

                                          $("#works-list").after('<div id="jzgd" onclick="jiazaiyi(\''+hzname+'\')" class="section-title"><h2>More</h2></div>');
                                }
                                //循环完参数后赋值给容器
                                $('#works-list').append(htmlptdoc);


                                //类型点击1.加上样式

                                 $(".typeclass").click(function(){
                                           $(".typeclass").removeClass("active");
                                           $(this).addClass("active");

                                 });


                                 $(".ptclass").click(function(){
                                           $(".ptclass").removeClass("active");
                                           $(this).addClass("active");

                                 });

                            }


                      }
            });

  //类型样式



        }



        //默认页码2
        var pageyi = 1;

        function jiazaiyi(hzname){
                 //页码累加
                 pageyi++;

                 //频率名称
                 $hzname = hzname;

                 $p = pageyi;

                  $.ajax({
                  url:"/zhanggw/index.php/Home/Supportservices/jiazaiyis",
                  type:'post',
                  dataType:'json',
                  data:{hzname:$hzname,p:$p},
                  async:true,
                  success:function(data){
                                  console.log(data);
                                  //$("#works-list").empty();
                                  var html = "";
                                  var count = 0;
                                  //清除文档下载ul的style
                                  $('#works-list').removeAttr("style");
                                  //下载id删除
                                  $('#jzgd').empty();
                                  $.each(data.ptdoc,function(i){

                                                       html += '<a></a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><a></a><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><a></a><div class="team-info-download"><a><h4>'+data.ptdoc[i].docname+'</h4></a><a target="_blank" href="/zhanggw/Public/Uploads/'+data.ptdoc[i].docurl+'"><button type="button" class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a></div></div></li>';
                                                         count = data.ptdoc[i].count;

                                                         if(pageyi >= count){
                                                           $('#jzgd').css('display','none');
                                                         }
                                                         var name = "'"+hzname+"'";
                                  });
                                 //循环完参数后赋值给容器
                                 $('#works-list').append(html);





                     }
               });//ajax结束

        }


        //类型加载更多默认页码
        var pagetype = 1;
        function jiazaitype(hzname,typename){

                 //页码累加
                 pagetype++;

                 //频率名称
                 $hzname = hzname;

                 $typename = typename;

                 $p = pagetype;

                  $.ajax({
                  url:"/zhanggw/index.php/Home/Supportservices/jiazaitype",
                  type:'post',
                  dataType:'json',
                  data:{hzname:$hzname,p:$p,typename:$typename},
                  async:true,
                  success:function(data){
                                  console.log(data);
                                  //$("#works-list").empty();
                                  var html = "";
                                  var count = 0;
                                  //清除文档下载ul的style
                                  $('#works-list').removeAttr("style");
                                  //下载id删除
                                  $('#jzgd').empty();
                                  $.each(data.ptdoc,function(i){

                                                       html += '<a></a><li class="mix graphic mix_all acessories" style="display: inline-block; opacity: 1;"><a></a><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><a></a><div class="team-info-download"><a><h4>'+data.ptdoc[i].docname+'</h4></a><a target="_blank" href="/zhanggw/Public/Uploads/'+data.ptdoc[i].docurl+'"><button type="button" class="sup-downloadbutton">Download<i class="fa fa-download"></i></button></a></div></div></li>';
                                                         count = data.ptdoc[i].count;

                                                         if(pagetype >= count){
                                                           $('#jzgd').css('display','none');
                                                         }
                                                         var name = "'"+hzname+"'";
                                  });
                                 //循环完参数后赋值给容器
                                 $('#works-list').append(html);





                     }
               });//ajax结束

        }


</script>



<!--下方滚动js-->
<script src="/zhanggw/Public/qiantai/js/scrollfix.js"></script>


<script type="text/javascript">
  var language = "<?php echo (L("language")); ?>";
  if(language=='cn_'){
    $("#china").addClass('header-pc-color');
    $("#mobilechina").addClass('header-mobile-color');
  }else if(language=='en_'){
    $("#english").addClass('header-pc-color');
    $("#mobileenglish").addClass('header-mobile-color');
  }
</script>


</body>
</html>