<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>行业详情</title>
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

  <style>
  /*swiper*/
    html, body {
        position: relative;
    }
    body {
        margin: 0;
        padding: 0;
    }
    .swiper-container {
        width: 100%;
    }
    .swiper-slide {
        text-align: center;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
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
          <li><a href="<?php echo U('Felg/Index');?>"><?php echo (L("head_product")); ?></a></li> 
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
  <section class="section mobile-vo-section">
      <div class="vocation-list-main-section-title">
        <h2><?php echo ($iyjieshaos['nameiy']); ?></h2>     
      </div>
      <div class="container">
        <div class="col-md-8">
          <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
				    <?php if(is_array($iyimgss)): $i = 0; $__LIST__ = $iyimgss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><img src="/guanwang/qwadmin<?php echo ($vo['iyimgs']); ?>"></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="col-md-4 mobile-voc-jieshao">
          <div class="project-info">
            <div><span><?php echo (L("vocationlistmain_hangyecontent")); ?></span><span class="icon-vocation-one">
			<i class="">
					<?php if($iyjieshaos['logoshow'] == 1): ?><a href="<?php echo ($iyjieshaos['linksiy']); ?>">
							<img  src="/guanwang/qwadmin/<?php echo ($iyjieshaos['iylogo']); ?>" alt="">
							</a><?php endif; ?>
			</i></span></div>
            <div style="clear:both"></div>
            <hr>
            <p style="text-align:left" id="content_one"></p>
          </div>
        </div>
      </div>
  </section>

  <section class="se-classic-case">
    <div class="container">
      <div class="classic-case">
        <h2><?php echo (L("vocationlistmain_jindian")); ?></h2>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="team animated" data-animation="fadeInUp" data-animation-delay="0">
          <div class="team-photo">
		    <?php if($iyjieshaos['anli1show'] == 1): ?><img src="/guanwang/qwadmin<?php echo ($iyjieshaos['anli1']); ?>" alt=""><?php endif; ?>
            
          </div>
          <div class="team-info">
            <h4 class="text-center"><?php echo ($iyjieshaos['anliname1']); ?></h4>            
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="team animated" data-animation="fadeInUp" data-animation-delay="500">
          <div class="team-photo">
             <?php if($iyjieshaos['anli2show'] == 1): ?><img src="/guanwang/qwadmin<?php echo ($iyjieshaos['anli2']); ?>" alt=""><?php endif; ?>
          </div>
          <div class="team-info">
            <h4 class="text-center"><?php echo ($iyjieshaos['anliname2']); ?></h4>            
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="team animated" data-animation="fadeInUp" data-animation-delay="1000">
          <div class="team-photo">
            <?php if($iyjieshaos['anli3show'] == 1): ?><img src="/guanwang/qwadmin<?php echo ($iyjieshaos['anli3']); ?>" alt=""><?php endif; ?>
          </div>
          <div class="team-info">
            <h4 class="text-center"><?php echo ($iyjieshaos['anliname3']); ?></h4>
          </div>
        </div>
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
        paginationClickable: true
    });
    </script>
<!--下方滚动js-->
<script src="/guanwang/qwadmin/Public/qiantai/js/scrollfix.js"></script>
<script>

var content="<?php echo ($iyjieshaos['iycontent']); ?>";
alert(content);
$("#content_one").html(htmlspecialchars_decode(content));
   function htmlspecialchars_decode(str){           
              str = str.replace(/&amp;/g, '&'); 
              str = str.replace(/&lt;/g, '<');
              str = str.replace(/&gt;/g, '>');
              str = str.replace(/&quot;/g, "''");  
              str = str.replace(/&#039;/g, "'");  
              return str;  
    }
</script>
</body>
</html>