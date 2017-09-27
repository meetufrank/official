<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>支持详情</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">  
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond./guanwang/qwadmin/Public/qiantai/js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/css/animate.css">
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/css/style.css">
  <!-- new css by wys -->
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/css/new.css">
  <link rel="stylesheet" type="text/css" href="/guanwang/qwadmin/Public/qiantai/Swiper-3.4.2/dist/css/swiper.css">
  <!-- Swiper styles -->
    <style>
    @media (max-width:768px) {
      .swiper-container {
        height:200px;
      }
      .swiper-slide-01{
        background-image:url(/guanwang/qwadmin/Public/qiantai/images/640X200.jpg);
/*        background-image:url(/guanwang/qwadmin/Public/qiantai/images/1920X6002.jpg);*/
      }
      .swiper-slide-02{
        background-image:url(/guanwang/qwadmin/Public/qiantai/images/640X2001.jpg);
/*        background-image:url(/guanwang/qwadmin/Public/qiantai/images/1920X6003.jpg);*/
      }
    }
    @media (min-width:768px) {
      .swiper-container {
        height:600px;
      }
      .swiper-slide-01{
        background-image:url(/guanwang/qwadmin/Public/qiantai/images/about-us.jpg);
      }
      .swiper-slide-02{
        background-image:url(/guanwang/qwadmin/Public/qiantai/images/1920X6003.jpg);
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
          <a class="navbar-brand" href="#home"><img src="/guanwang/qwadmin/Public/qiantai/images/logo.png" alt=""></a>
        </div>
      </div>
      <div class="hidden-xs">
        <ul class="nav navbar-nav">
		
          <li><a href="<?php echo U('?lang=ch-cn');?>">中文</a></li>
          <li><a href="#">丨</a></li> 
          <li><a href="<?php echo U('?lang=en-us');?>">EN</a></li>
        </ul>
      </div>
      <form class="navbar-form navbar-left">
          <div class="form-group">
              <input type="text" id="arrcity" class="form-control" value="<?php echo (L("head_search")); ?>">
              <div id='suggest' class="ac_results"></div>
          </div>
      </form>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav" id="nav">
          <li class="visible-xs"><a href="index.html" style="display:inline-block">中文</a>丨<a href="#" style="display:inline-block">EN</a></li>
          <li><a href="<?php echo U('Index/Index');?>"><?php echo (L("head_Index")); ?></a></li>
          <li><a href="feig.html"><?php echo (L("head_product")); ?></a></li> 
          <li><a href="<?php echo U('Vocationlist/Index');?>"><?php echo (L("head_Industry")); ?></a></li>
          <li><a href="<?php echo U('Supportservices/Index');?>"><?php echo (L("head_support")); ?></a></li>
          <li><a href="aboutus.html"><?php echo (L("head_about")); ?></a></li>
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
            <div class="swiper-slide swiper-slide-02"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>

    </div>

<!-- swiper -->
<!-- CDK-->
  <section>
    <div class="container">
      <div class="sup-section-title">
        <h2><a href="support-services.html"><span class="cdkclass cdk-class-one">CDK</span></a><a href="support-services-demo.html"><span class="cdkclass">DEMO</span></a></h2>
      </div>
	  <?php if(is_array($cdk)): $i = 0; $__LIST__ = $cdk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="col-md-4 col-sm-6">
          <div class="team-info">
            <h4><?php echo ($val['stname']); ?></h4>
            <p><?php echo ($val['sttitle']); ?></p>
            <p><a href="/guanwang/qwadmin/Public/Uploads/<?php echo ($val['file']); ?>"><button type="button" class="sup-downloadbutton">下载<i class="fa fa-download"></i></button></a></p>
          </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </section>  
  <footer>
    <div class="container">
      <div class="col-xs-6">
        <ul class="social">
          <li><a href="#" id="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-weibo"></i></a></li>
          <li><a href="#"><i class="fa fa-weixin"></i></a></li>
        </ul>
      </div>
      <div class="col-xs-6">
        <h5 class="footer-text">沪ICP备17008922</h5>
      </div>
    </div>
  </footer>
</div>  
<!-- Scripts -->
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/jquery.min.js"></script>
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/flexslider.js"></script>
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/owl.carousel.js"></script>
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/jquery.appear.js"></script>
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/mixitup.js"></script>
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/jquery.validation.js"></script>
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/jquery.parallax-1.1.3.js"></script>

<!-- Main JS File -->
<script type="text/javascript" src="/guanwang/qwadmin/Public/qiantai/js/main.js"></script>
<!--下拉搜索JS-->
<script src="/guanwang/qwadmin/Public/qiantai/js/aircity.js"></script>
<!--swiper-->
<script src="/guanwang/qwadmin/Public/qiantai/Swiper-3.4.2/dist/js/swiper.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
    });
</script>
<!--下方滚动js-->
<script src="/guanwang/qwadmin/Public/qiantai/js/scrollfix.js"></script>
</body>
</html>