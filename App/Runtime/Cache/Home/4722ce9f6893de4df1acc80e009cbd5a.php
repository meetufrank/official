<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title><?php echo (L("title_Product")); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond./Public/qiantai/js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/animate.css">
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/style.css">
  <!-- new css by wys -->
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/new.css">
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/Swiper-3.4.2/dist/css/swiper.css">
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
          <a class="navbar-brand" href="<?php echo U('Index/Index');?>"><img src="/Public/qiantai/images/logo.png" alt=""></a>
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
  <section class="section mobile-vo-section">
      <div class="classic-case">
        <h2><?php echo ($felgxiangqing["typename"]); ?></h2>
      </div>
      <div class="container">
        <div class="col-md-6">
            <div class="col-md-12" style="border-bottom:1px solid">
              <h2><?php echo ($felgxiangqing["ftname"]); ?></h2>
              <p style="text-align:left"><?php echo ($felgxiangqing["fttitle"]); ?></p>
            </div>
            <div class="col-md-12">
              <h3></h3>
			  <?php echo ($felgxiangqing["ftspec"]); ?>

            </div>
            <div class="col-md-12">
			   <?php if(is_array($felgptdowns)): $i = 0; $__LIST__ = $felgptdowns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Public/Uploads/<?php echo ($vo['down']); ?>" target="view_window"><button type="button" class="downloadbutton"><?php echo ($vo['downname']); ?><i class="fa fa-download"></i></button></a>
				  &nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="col-md-6 mobile-voc-jieshao">
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="<?php echo ($felgxiangqing["ftimg"]); ?>""></div>
                </div>
            </div>
        </div>
      </div>
  </section>

  <section class="se-classic-case">
    <?php if($yingchang != 1): ?><div class="container">


        <div class="classic-case">

             <h2><?php echo (L("peitao")); ?></h2>

        </div>
<?php else: endif; ?>




	  <?php if(is_array($mfelg)): $i = 0; $__LIST__ = $mfelg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Productdetails/index');?>?type=1&&id=<?php echo ($vo['id']); ?>">
			  <div class="col-md-3 col-sm-6">
				<div class="team animated" data-animation="fadeInUp" data-animation-delay="0">
				  <div class="team-photo">
					<img src="<?php echo ($vo['ftimg']); ?>" alt="">
				  </div>
				  <div class="team-info">
					<h4><?php echo ($vo['ftname']); ?></h4>
					<p><?php echo ($vo['fttitle']); ?></p>
				  </div>
				</div>
			  </div>
		  </a><?php endforeach; endif; else: echo "" ;endif; ?>



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
<script type="text/javascript" src="/Public/qiantai/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/qiantai/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/qiantai/js/flexslider.js"></script>
<script type="text/javascript" src="/Public/qiantai/js/owl.carousel.js"></script>
<script type="text/javascript" src="/Public/qiantai/js/jquery.appear.js"></script>
<script type="text/javascript" src="/Public/qiantai/js/mixitup.js"></script>
<script type="text/javascript" src="/Public/qiantai/js/jquery.validation.js"></script>
<script type="text/javascript" src="/Public/qiantai/js/jquery.parallax-1.1.3.js"></script>

<!-- Main JS File -->
<script type="text/javascript" src="/Public/qiantai/js/main.js"></script>
<!--下拉搜索JS-->
<script src="/Public/qiantai/js/aircity.js"></script>
<!--swiper-->
<script src="/Public/qiantai/Swiper-3.4.2/dist/js/swiper.min.js"></script>
<script src="/Public/qiantai/layer/mobile/layer.js"></script>
<script>
$("#facebook").click(function(){
	var mycontent='<img src="/Public/qiantai/images/erweima.jpg">';
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
        noSwiping：true
    });
    </script>
<!--下方滚动js-->
<script src="/Public/qiantai/js/scrollfix.js"></script>

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