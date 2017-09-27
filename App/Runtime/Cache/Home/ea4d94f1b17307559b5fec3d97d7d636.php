<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title><?php echo (L("title_Support")); ?></title>
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
  <!-- Swiper styles -->
    <style>
    @media (max-width:768px) {
      .swiper-container {
        height:200px;
      }

      .swiper-slide-02{
        background-image:url(/Public/qiantai/images/640X2001.jpg);
/*        background-image:url(/Public/qiantai/images/1920X6003.jpg);*/
      }
      .code-section{
        padding-top: 40px;
        padding-bottom: 40px;
        margin: 0 15px;
      }
    }
    @media (min-width:768px) {
      .swiper-container {
        height:450px;
        /*height:510px*/
      }
      .swiper-slide-01{
        background-image:url(/Public/qiantai/images/1920X6002.jpg);
      }
      .swiper-slide-02{
        background-image:url(/Public/qiantai/images/1920X6003.jpg);
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
    /*下载资料轮播*/
    .swiper-container-code {
        width: 100%;
        height: 330px;
        margin: 20px auto;
    }
    .swiper-slide-code {
         text-align: center;
        font-size: 18px;
        background: #fff;

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
    .team-info-code{
      width: 100%;
      padding:40px 10px;
/*      border:2px solid #EFEFF1;*/
      height:150px;
/*      overflow: auto;*/
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
<!-- Swiper -->
<!--     <div class="swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide swiper-slide-02"></div>
        </div>

        <div class="swiper-pagination swiper-pagination-white"></div>

    </div> -->

<!-- swiper -->
<!-- 信息码 -->
<section class="code-section">
    <div class="code-container" style="padding-top: 60px;">
          <div class="section-title code-section-title" id="code-section-title">
            <div class="code-inf-header"><?php echo (L("code_name")); ?></div>
            <p><?php echo (L("code_pyi")); ?></p>
            <p><?php echo (L("code_per")); ?></p>
            <p><?php echo (L("code_psan")); ?></p>
            <form>
            <p><input id="code" type="text" class="code-form-input" placeholder="<?php echo (L("code_texthint")); ?>"></p>
            <p><button id="btn" type="button" class="code-submit"><?php echo (L("code_button")); ?></button></p>
            </form>
          </div>
    </div>
</section>
<!--下载码-->
<section id="team" class="team-index team-code-dow">
      <div class="container">
          
           <?php if(is_array($supports)): $i = 0; $__LIST__ = $supports;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="col-md-3 col-sm-6">
					  <div class="team animated cent" data-animation="fadeInUp" data-animation-delay="0" id="cent">
						<div class="team-info-code">
							<h4 style="font-weight: bold;color: #02AAF1; text-align: center;"><?php echo ($val['stname']); ?></h4>
							<p style="text-align: center;">
							  <a href="/Public/Uploads/<?php echo ($val['file']); ?>" target="view_window">
								<button type="button" class="sup-downloadbutton"><?php echo (L("code_download")); ?><i class="fa fa-download"></i></button>
							  </a>
							</p>
						</div>
					  </div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
          
      </div>
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
<!-- banner Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
    });
</script>
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


<script>
 $("#btn").click(function(){
    $code = $("#code").val();
	$codelink = "<?php echo U('Supportservices/Index');?>";
	$error = "<?php echo (L("code_error")); ?>";
    $.ajax({
	    url:"/index.php/Home/Codeinput/code",
		type:"post",
		dataType:"json",
		data:{code:$code},
		success:function(data){
		    if(data == 1){
			  window.location.href=$codelink;//你可以跟换里面的网址，以便成功后跳转
			}else if(data == 2){
			    alert($error);
			}

		}

	});

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