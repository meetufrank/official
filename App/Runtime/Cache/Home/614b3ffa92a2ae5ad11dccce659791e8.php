<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/style.css?id=2">
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/style.css?id=2">
  <!-- new css by wys -->
  <link rel="stylesheet" type="text/css" href="/Public/qiantai/css/new.css?v=1.0">
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
          <li><a href="#" style="pointer-events: none">丨</a></li>
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
          <li class="dropdown visible-lg visible-md visible-sm" id="dropdownparent"><a href="#" <?php if($style_change == Feig OR $style_change == Rflinker): ?>class="hbgcolor dropdown-toggle" data-toggle="dropdown"<?php endif; ?>><?php echo (L("head_product")); ?></a>
            <ul class="dropdown-menu" id="dropdown">
                    <li><a href="<?php echo U('Rflinker/Index');?>">Rflinker</a></li>
                    <li><a href="<?php echo U('Feig/Index');?>">Feig</a></li>
            </ul>
          </li>
          <li class="visible-xs"><a href="#">rflinker</a></li>
          <li class="visible-xs"><a href="#">feig</a></li>
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
<div class="scrollable product-scrollable" id="scrollable">
  <div class="container-fluid p-container-fluid">
    <div class="row" id="product-intro">
            <!-- 频率类型 -->
			<?php if(is_array($hztype_arr)): $i = 0; $__LIST__ = $hztype_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-lg-4 col-xs-12 product-float">
								<div class="product-dropdown">
										<a href="#" title="Produkte nach Kategorie" class="prda" id="<?php echo ($vo['hz']['id']); ?>"><?php echo ($vo['hz']['hzname']); ?><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
									<div class="product-dropdown-inner">
										<?php if(is_array($vo['type'])): $i = 0; $__LIST__ = $vo['type'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voer): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Feighztype/index');?>?typeid=<?php echo ($voer['id']); ?>&fid=<?php echo ($voer['hzid']); ?>" title="Produkte nach Kategorie" id="<?php echo ($voer['id']); ?>"><?php echo ($voer['fgtypename']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div>	
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

	
	
	
    <div class="panels">
        <div class="panel-group" id="accordion">
		
		     <?php if(is_array($hztypes_arr)): $i = 0; $__LIST__ = $hztypes_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="panel panel-default my-panel-heading">
					<div class="panel-heading">
					  <h2 class="panel-title">
						<a id="<?php echo ($vo['type']['id']); ?>" data-toggle="collapse" data-parent="#accordion" 
						   data-target="#<?php echo (str_replace(' ','',$vo['type']['fgtypename'])); ?>">
						   <?php echo ($vo['type']['fgtypename']); ?>
						</a>
					  </h2>
					</div>
					<div id="<?php echo (str_replace(' ','',$vo['type']['fgtypename'])); ?>" class="panel-collapse collapse">
					  <div class="panel-body">
					    <div class="panel-body">
                              <iframe src="<?php echo U('Swiper/index');?>?typeid=<?php echo ($vo['type']['id']); ?>&fid=<?php echo ($vo['type']['hzid']); ?>" style="width:1280px;height:500px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0"></iframe>
                        </div>
					  </div>
					</div>
				  </div><?php endforeach; endif; else: echo "" ;endif; ?> 
			
			

	   
        </div>
    </div>
  </div>
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
    // var parenth = document.getElementById('dropdownparent').offsetWidth;
    // document.getElementById('dropdown').style.width=parenth+"px";
  }
</script>
<script type="text/javascript">
  $(".prda").click(function(){
        if($(".product-dropdown-inner").hasClass('open')){
            $(".product-dropdown-inner").removeClass('open');
        }else{
            $(".product-dropdown-inner").addClass('open');
        }
    });
</script>
</body>
</html>