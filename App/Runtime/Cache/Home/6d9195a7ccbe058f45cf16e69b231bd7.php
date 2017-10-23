<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title><?php echo (L("title_About")); ?></title>
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
<div class="scrollable" id="scrollable">
  <!-- Backgrounds -->
  <div class="container about-banner">
  </div>
  <!-- End Backgrounds -->

  <section id="team" class="mobile-team">
    <div class="container">
      <div class="section-title">
        <h2>公司介绍</h2>
        <p>上海润斐电子科技有限公司</p>
        <p style="text-align:left;text-align:justify;text-justify:inter-ideograph;text-indent: 37px">上海润斐电子科技有限公司是一家致力于物联网行业，专业为客户提供RFID产品及相关硬件解决方案的公司。</p>
        <p style="text-align:left;text-align:justify;text-justify:inter-ideograph;text-indent: 37px">
公司多年来累积丰富的RFID市场实务经验、研发生产技术，可为客户提供最完整的RFID产品及需求规划。除专精于RFID外，于广度上，公司不断引进各种新式的Auto ID技术，各种新式电子识别技术等都将是公司全力着墨的市场。</p>
<p style="text-align:left;text-align:justify;text-justify:inter-ideograph;text-indent: 37px">
公司目前所代理的FEIG品牌读写设备，产品覆盖：高频（HF）、超高频（UHF），在国内外享有较高的声誉。产品以业内最高的元器件标准，最可靠的产品质量，最有前瞻性的产品线规划，最齐全的系统开发平台，可为客户提供最完整的RFID硬件解决方案。
</p>
      </div>

    </div>
  </section>  

 <section id="team">
    <div class="container">
      <div class="section-title">
        <h2>公司愿景</h2>
        <p style="text-align:left;text-align:justify;text-justify:inter-ideograph;text-indent: 10px">企业愿景：体现了企业家的立场和信仰，是企业最高管理者头脑中的一种概念，是这些最高管理者对企业未来的设想。是对“我们代表什么”“我们希望成为怎样的企业？”的持久性回答和承诺。 企业愿景也不断地激励着企业奋勇向前，拼搏向上。何谓企业愿景？是指企业的长期愿望及未来状况，组织发展的蓝图，体现组织永恒的追求。企业愿景是企业的发展方向及战略定位的体现，聚焦企业管理八大领域，快速提升CEO自身领导力及管理能力籍此达到推动企业成长的目的。</p>
      </div>
    </div>
  </section>

  <section id="contact" class="parallax-section">
   <div class="parallax-overlay">
    <div class="container">
      <div class="section-title">
        <h2>上海总公司</h2>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="team animated" data-animation="fadeInUp" data-animation-delay="1000">
          <div class="team-photo">
             <h4 class="text-center"><?php echo (L("addressname")); ?>:<?php echo (L("bottom_address")); ?></h4>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="team animated" data-animation="fadeInUp" data-animation-delay="1000">
          <div class="team-photo">
             <h4 class="text-center"><?php echo (L("telname")); ?>:13918999394</h4>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="team animated" data-animation="fadeInUp" data-animation-delay="1000">
          <div class="team-photo">
             <h4 class="text-center"><?php echo (L("emailname")); ?>:13918999394@163.com</h4>
          </div>
        </div>
      </div>

      </div>
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
<!--下方滚动js-->
<script src="/Public/qiantai/js/scrollfix.js"></script>
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