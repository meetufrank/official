<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title><?php echo (L("title_Index")); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond./officialweb/Public/qiantai/js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="/officialweb/Public/qiantai/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/officialweb/Public/qiantai/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/officialweb/Public/qiantai/css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="/officialweb/Public/qiantai/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/officialweb/Public/qiantai/css/animate.css">
  <link rel="stylesheet" type="text/css" href="/officialweb/Public/qiantai/css/style.css?a=1">
  <!-- new css by wys -->
  <link rel="stylesheet" type="text/css" href="/officialweb/Public/qiantai/css/new.css">
  <style type="text/css">
    .cs{
            width:100%;
            height:200px;
            background:rgba(238,238,238,0.8);
            top:0px;
            position:absolute;
            opacity: 0;
            display: block;
            font-size: 12px;
            transition: 0.5s;
            -webkit-transition: .8s;
            -moz-transition: .8s;
            padding-top: 25%;
        }
        .cent:hover .cs{
            opacity: 1;
        }
        .cent:hover .team-info{
          opacity: 0;
        }
      .cs .cs-title{
        text-align: center;
        margin: 0 auto;
        color: black;
        font-size:22px;
        font-weight: bold;
      }
      .cs .cs-main{
        color:black;
        font-size:18px;
        font-weight: bold;
        text-align: center;
      }
      .rf-cs{
         width:100%;
            height:200px;
            background:rgba(238,238,238,0.8);
            top:0px;
            position:absolute;
            opacity: 0;
            display: block;
            font-size: 12px;
            transition: 0.5s;
            -webkit-transition: .8s;
            -moz-transition: .8s;
            padding-top: 25%;
      }
      .rf-cent:hover .rf-cs{
            opacity: 1;
        }
      .rf-cent:hover .team-info{
          opacity: 0;
      }
      .rf-cs .rf-cs-title{
        text-align: center;
        margin: 0 auto;
        color: black;
        font-size:22px;
        font-weight: bold;
      }
      .rf-cs .rf-cs-main{
        color:black;
        font-size:18px;
        font-weight: bold;
        text-align: center;
      }
  </style>
</head>
<body>
  <!-- Header -->
    <!-- 包含头部文件header -->


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
          <a class="navbar-brand" href="<?php echo U('Index/Index');?>"><img src="/officialweb/Public/qiantai/images/logo.png" alt=""></a>
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
                    <li><a href="<?php echo U('Rflinker/Index');?>">rflinker</a></li>
                    <li><a href="<?php echo U('Feig/Index');?>">feig</a></li>
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
  <div id="backgrounds">
    <ul class="slides">

	  <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['fwshowpc'] != 2 and $val['flashviewpc'] != ''): ?><li><img src="/officialweb<?php echo ($val['flashviewpc']); ?>" alt=""></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

    </ul>
  </div>
  <!-- End Backgrounds -->

<div id="home">

  <div class="slide-caption">

			  <div class="slide-middle">
				<div class="slide-intro">
				  <h3></h3>

				</div>
				<div id="home-slider" class="flexslider">
				  <ul class="slides">
				    <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['fwshowpc'] != 2 and $val['flashviewpc'] != ''): ?><li><h1><a style="text-decoration:none; color:#fff;;" href="<?php echo ($val['fwlink']); ?>"><?php echo ($val['title']); ?></a></h1></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				  </ul>
				</div>
				<div class="home-text">


				</div>
			  </div>

    </div>

</div>
<!-- FEIG产品 -->
 <?php if($indexshowlist["fghzshow"] == 1 ): ?><section id="team" class="team-index">
			<div class="container">
			  <div class="section-title">
				<!-- <h2><?php echo (L("index_FEIG")); ?></h2> -->
        <img src="/officialweb/Public/qiantai/images/FEIG_Logo.png">
				<p><?php echo ($indexshowlist["fghzname"]); ?></p>
			  </div>
			  <?php if(is_array($felghzs)): $i = 0; $__LIST__ = $felghzs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Feig/Index');?>?id=<?php echo ($val['id']); ?>">
						<div class="col-md-3 col-sm-6">
						  <div class="team animated cent" data-animation="fadeInUp" data-animation-delay="0" id="cent">
  							<div class="team-photo">
  							  <img src="/officialweb<?php echo ($val['fghzimg']); ?>" alt="">
  							</div>
  							<div class="team-info">
  							  <h4><?php echo ($val['fghz']); ?></h4>
  							  <p><?php echo ($val['fghztitle']); ?></p>
  							</div>
                <div class="cs">
                  <p class="cs-title"><?php echo ($val['fghz']); ?></p>
                  <p class="cs-main"><?php echo ($val['fghztitle']); ?></p>
                </div>
							</div>
						</div>
					  </a><?php endforeach; endif; else: echo "" ;endif; ?>

			</div>
	  </section>
    <?php else: endif; ?>

<!-- RFLINKER产品 -->
 <?php if($indexshowlist["rrhzshow"] == 1 ): ?><section id="team" class="team-index">
    <div class="container">
      <div class="section-title">
        <img src="/officialweb/Public/qiantai/images/RFlinker_Logo.png">
        <p><?php echo ($indexshowlist["rrhzname"]); ?></p>
      </div>
	  <?php if(is_array($rrzs)): $i = 0; $__LIST__ = $rrzs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Rflinker/Index');?>?id=<?php echo ($val['id']); ?>">
			  <div class="col-md-3 col-sm-6">
				<div class="team animated rf-cent" data-animation="fadeInUp" data-animation-delay="0">
				  <div class="team-photo">
					<img src="/officialweb<?php echo ($val['rrimg']); ?>" alt="">
				  </div>
				  <div class="team-info">
					 <h4><?php echo ($val['rflinkerhz']); ?></h4>
					 <p><?php echo ($val['rrtitle']); ?></p>
				  </div>
          <div class="rf-cs">
              <p class="rf-cs-title"><?php echo ($val['rflinkerhz']); ?></p>
              <p class="rf-cs-main"><?php echo ($val['rrtitle']); ?></p>
          </div>
				</div>
			  </div>
		  </a><?php endforeach; endif; else: echo "" ;endif; ?>


    </div>
</section>
    <?php else: endif; ?>
<!--推荐产品 -->
 <?php if($indexshowlist["tjhzshow"] == 1 ): ?><section id="team" class="team-index">
    <div class="container">
      <div class="section-title">
        <h2><?php echo (L("index_Recommend")); ?></h2>
        <p><?php echo ($indexshowlist["tjhzname"]); ?></p>
      </div>
	  <?php if(is_array($tuijians)): $i = 0; $__LIST__ = $tuijians;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['type'] == 1): ?><a href="<?php echo U('Productdetails/Index');?>?type=1&&id=<?php echo ($val['id']); ?>">
					  <div class="col-md-3 col-sm-6">
						<div class="team animated" data-animation="fadeInUp" data-animation-delay="0">
						  <div class="team-photo">
							<img src="/officialweb<?php echo ($val['ftimg']); ?>" alt="">
						  </div>
						  <div class="team-info">
							<h4><?php echo ($val['ftname']); ?></h4>
							<p><?php echo ($val['fttitle']); ?></p>
						  </div>
						</div>
					  </div>
				  </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </section>
     <?php else: endif; ?>
<!--行业应用 -->
  <section id="portfolio" class="grey">
    <div class="section-title">
      <h2><?php echo (L("index_Industry")); ?></h2>
    </div>
    <div class="section-title">
        <p><?php echo (L("index_Industrytitle")); ?></p>
    </div>
    <ul id="works-list" class="nav">

	  <?php if(is_array($iyimg)): $i = 0; $__LIST__ = $iyimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Vocationlistmain/index');?>?id=<?php echo ($vo['id']); ?>">
					  <li class="mix graphic mix_all">
						<img src="/officialweb<?php echo ($vo['imgiy']); ?>" alt="">
					  </li>
			  </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </section>
<!--联系我们-->
  <section id="contact" class="parallax-section">
    <div class="parallax-overlay">
      <div class="container">
        <div class="col-md-8 col-md-offset-2">
          <div class="section-title">
            <h2><?php echo (L("index_FormTitle")); ?></h2>
          </div>
          <p style="font-size: 1.5rem;text-align: center; color: white"><?php echo (L("telname")); ?>:13918999394</p>
          <form class="contact-form" method="post" action="contact.php" id="contactus">
            <div class="form-select-f">
              <select id="lxwenti" class="form-select" name="SelectType">
                <option selected="selected"  class="opbgcolor" value="1"><?php echo (L("index_FormProblemyi")); ?></option>
                <option class="opbgcolor" value="2"><?php echo (L("index_FormProblemer")); ?></option>
              </select>
            </div>
            <div class="form-double">
              <div class="form-group">
                <input  name="UserName" type="text" class="form-control" placeholder="<?php echo (L("index_FormName")); ?>"><span></span>
              </div>
              <div class="form-group last">
                <input  name="UserMail" type="text" class="form-control" placeholder="<?php echo (L("index_FormEmail")); ?>" id="mymail" ><span></span>
              </div>
              <div class="form-group last">
                <input name="UserTel" type="text" class="form-control" placeholder="<?php echo (L("index_FormTel")); ?>" id="mytel"><span></span>
              </div>
            </div>
            <div class="form-group">
              <textarea  name="TextSay" class="form-control" placeholder="<?php echo (L("index_FormContent")); ?>"></textarea><span></span>
            </div>
            <div class="form-submit">
              <input  type="submit" class="btn btn-empty btn-lg" id="#tijiao" value="<?php echo (L("index_FormSubmit")); ?>">
            </div>
          </form>
          <div class="form-sent">
            <div class="alert alert-success">
              <h6>Your Message Has Been Sent! Thank you for contacting us.</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--尾部 -->
  <!-- 包含底部模板footer -->
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

<script type="text/javascript" src="/officialweb/Public/qiantai/js/jquery.min.js"></script>
<script type="text/javascript" src="/officialweb/Public/qiantai/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/officialweb/Public/qiantai/js/flexslider.js"></script>
<script type="text/javascript" src="/officialweb/Public/qiantai/js/owl.carousel.js"></script>
<script type="text/javascript" src="/officialweb/Public/qiantai/js/jquery.appear.js"></script>
<script type="text/javascript" src="/officialweb/Public/qiantai/js/mixitup.js"></script>
<script type="text/javascript" src="/officialweb/Public/qiantai/js/jquery.validation.js"></script>
<script type="text/javascript" >
jQuery.extend(jQuery.validator.messages, {
    required: "必填信息",
    remote: "用户名已存在",
    email: "<?php echo (L("index_FormEmailtrue")); ?>",
    url: "请输入合法的网址",
    date: "请输入合法的日期",
    dateISO: "请输入合法的日期 (ISO).",
    number: "请输入合法的数字",
    digits: "只能输入整数",
    creditcard: "请输入合法的信用卡号",
    equalTo: "请再次输入相同的值",
    accept: "请输入拥有合法后缀名的内容",
    maxlength: jQuery.validator.format("请输入一个长度最多是 {0} 的内容"),
    minlength: jQuery.validator.format("请输入一个长度最少是 {0} 的内容"),
    rangelength: jQuery.validator.format("请输入一个长度介于 {0} 和 {1} 之间的内容"),
    range: jQuery.validator.format("请输入一个介于 {0} 和 {1} 之间的值"),
    max: jQuery.validator.format("请输入一个最大为 {0} 的值"),
    min: jQuery.validator.format("请输入一个最小为 {0} 的值")
});
</script>
<script type="text/javascript" src="/officialweb/Public/qiantai/js/jquery.parallax-1.1.3.js"></script>

<!-- Main JS File -->
<script type="text/javascript" src="/officialweb/Public/qiantai/js/main.js"></script>
<!--下拉搜索JS-->
<script src="/officialweb/Public/qiantai/js/aircity.js"></script>
<!--下方滚动js-->
<script src="/officialweb/Public/qiantai/js/scrollfix.js"></script>
<!--layer-mobile.js-->
<script src="/officialweb/Public/qiantai/layer/mobile/layer.js"></script>
<script>
$("#facebook").click(function(){
  var mycontent='<img src="/officialweb/Public/qiantai/images/erweima.jpg">';
  layer.open({
    style: 'border:none;width:auto;height:auto;padding:0px 0px;',
    content:mycontent
  });
  $(".layui-m-layercont").css({ padding: "0px 0px" });
});
</script>



<!-- 联系我们 -->
<script>

  // 手机号码验证
  jQuery.validator.addMethod("isMobile", function(value, element) {
      var length = value.length;
      var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
      return this.optional(element) || (length == 11 && mobile.test(value));
  }, "<?php echo (L("index_Formtelture")); ?>");


    $("#contactus").validate({
       rules: {
                    UserName: { required: true, },
                    UserTel: {  number:true,isMobile:true,min:11},
                    UserMail: { email:true,},
                    TextSay: { required: true,maxlength:300 }
                },
                messages:{
                    UserName: {
                        required: "<?php echo (L("index_Formpleasename")); ?>",
                     },
                    UserTel: {
                        required: "<?php echo (L("index_Formpleastel")); ?>",
                        number:"<?php echo (L("index_Formtelnum")); ?>",
                        min: "<?php echo (L("index_Formtelshiyi")); ?>",
                        isMobile:"<?php echo (L("index_Formteltrue")); ?>",
                     },
                    UserMail: {
                        required: "<?php echo (L("index_Forpleasmemail")); ?>",
                    },
                    TextSay: {
                        required: "<?php echo (L("index_Forpleasjianyi")); ?>",
                     }
                },
                /*错误提示位置*/
                errorPlacement: function (error, element) {
                    error.appendTo(element.siblings("span"));
                },
                submitHandler:function() {
                  $("#mytel").siblings("span").empty();
                  $("#mymail").siblings("span").empty();
                     if(!$("#mytel").val()&&!$("#mymail").val()){
                        var str="<?php echo (L("index_Fortelemailbi")); ?>";
                        $("#mytel").siblings("span").append(str);
                        $("#mymail").siblings("span").append(str);
                        return false;
                     }
                  layer.open({
                    type: 2,content: '<?php echo (L("index_Formtijiaozho")); ?>',
                    time: 1 //2秒后自动关闭
                  });




                  $.ajax({
                    type:"POST",
                    url:"/officialweb/index.php/Home/Index/email",
                    dataType: "json",
                    data:$("#contactus").serialize(),
                    success: function(data){

                    if(data.error==12){
                              if(data.url){
                              window.location.href=data.url;return;
                              }
                            }
                    if(data == 1){

                              layer.open({
                                      content: '<?php echo (L("index_Formtijiaotrue")); ?>'
                                        ,skin: 'msg'
                                        ,time: 2 //2秒后自动关闭
                                    });
                    }else{
                           layer.open({
                                      content: '<?php echo (L("index_Formtijiaofalse")); ?>!'
                                        ,skin: 'msg'
                                        ,time: 2 //2秒后自动关闭
                                    });
                    }
                    }
                  });

                        },
                 debug:true

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