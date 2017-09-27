<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>FEIG产品列表</title>
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

	   <?php if(is_array($productlistimgss)): $i = 0; $__LIST__ = $productlistimgss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['fwshowpc'] == 1): ?>.swiper-slide-<?php echo ($i); ?>{
                            background-image:url(<?php echo ($vo['flashviewphone']); ?>);     
                        }
				   <?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
	
     
      
    }
    @media (min-width:768px) {
      .swiper-container {
        height:600px;
      }
	   <?php if(is_array($productlistimgss)): $i = 0; $__LIST__ = $productlistimgss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['fwshowpc'] == 1): ?>.swiper-slide-<?php echo ($i); ?>{
							background-image:url(<?php echo ($vo['flashviewpc']); ?>);
						}
				   <?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
     
      
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
          <li><a href="<?php echo U('Felg/Index');?>" <?php if($style_change == Felg or $style_change == Rflinker): ?>class="hbgcolor"<?php endif; ?>><?php echo (L("head_product")); ?></a></li> 
          <li><a href="<?php echo U('Vocationlist/Index');?>" <?php if($style_change == Vocationlist): ?>class="hbgcolor"<?php endif; ?>><?php echo (L("head_Industry")); ?></a></li>
          <li><a href="<?php echo U('Codeinput/Index');?>" <?php if($style_change == Codeinput): ?>class="hbgcolor"<?php endif; ?>><?php echo (L("head_support")); ?></a></li>
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
	
			   <?php if(is_array($productlistimgss)): $i = 0; $__LIST__ = $productlistimgss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['fwshowpc'] == 1): ?><div class="swiper-slide swiper-slide-<?php echo ($i); ?>"></div>
				   <?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>

    </div>
<!-- FEIG产品 -->
<section id="portfolio" class="product-list-section">
    <div class="productlist-section-title">
        <h2><a href="#"><span class="product-header-class cdk-class-one"><?php echo (L("felg_range")); ?></span></a>
        <a href="<?php echo U('Rflinker/Index');?>"><span class="product-header-class"><?php echo (L("felg_rflinker")); ?></span></a>
        </h2>
    </div>
    
	  <!-- 频率 -->
    <div class="nav-section-title nac-feig-title">
      <p class="product-p-border"><?php echo (L("felg_hztext")); ?></p>
        <ul id="filters" class="nav">
		   <?php if(is_array($felghzselect)): $i = 0; $__LIST__ = $felghzselect;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li onclick="felghz(1,'<?php echo ($val['fghz']); ?>',<?php echo ($val['id']); ?>)"  id="filter<?php echo ($val['id']); ?>"
			class="filter hz  
			   <?php if($indexhzname == '' and $i == 1): ?>active yi<?php elseif($indexhzname == $val['fghz']): ?>active yi<?php endif; ?>
			   " data-filter="<?php echo ($val['fghz']); ?>">
			   <?php echo ($val['fghz']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
	
	  <!-- 类型 -->
    <div class="nav-section-title nac-feig-title">
    <p class="product-p-border"><?php echo (L("felg_typetext")); ?></p>
      <ul id="filter_s" class="nav">
	        <?php if(is_array($yitype)): $i = 0; $__LIST__ = $yitype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li id="filtertype<?php echo ($val['id']); ?>"   class="filter type typeyiclass" onclick = "hztypeptyi('<?php echo ($hzyiselect); ?>','<?php echo ($val['fgtypename']); ?>')" data-filter="<?php echo ($val['fgtypename']); ?>"><?php echo ($val['fgtypename']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>	    
      </ul>
    </div>


    <!-- 产品 -->
    <ul id="works-list" class="nav">

         <?php if(is_array($felgptyiselect)): $i = 0; $__LIST__ = $felgptyiselect;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Productdetails/index');?>?type=1&&id=<?php echo ($val['id']); ?>">
                <li class="mix graphic mix_all" style="display: inline-block; opacity: 1;">
                   <div class="team team-feig animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0">
                    <div class="team-photo"><img src="<?php echo ($val['ftimg']); ?>" alt=""></div>
                    <div class="team-info">
                       <h4><?php echo ($val['ftname']); ?></h4>
                       <p><?php echo ($val['fttitle']); ?></p>
                    </div>
                   </div>
                </li>
              </a><?php endforeach; endif; else: echo "" ;endif; ?> 




    </ul>
	
	
    <?php if($icount > 8 ): ?><div id="jzgdyi" onclick="jiazaiyi('<?php echo ($hzyiselect); ?>')" class="section-title">
             <h2>To Lode More</h2>
        </div>
    <?php else: endif; ?>
		
	 
	
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
<script src="/Public/qiantai/layer_mobile/layer.js"></script>
<script>
$("#facebook").click(function(){
	var mycontent='<img src="/Public/qiantai/images/erweima.jpg">';
	layer.open({
  		content:mycontent
	});
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



  


    //默认页码2
  var pageyi = 1;


  //频率产品的加载更多
  function jiazaiyi(name){
 

       pageyi++;

       //频率名称
       $hzname = name;
 
       $p = pageyi;


       $.ajax({
            type:"post",
            url:"/index.php/Home/Felg/felghzyijiazai",
            dataType:"json",
            data:{p:$p,hzname:$hzname},
            success:function(data){
            console.log(data);
                 var hzname = "";
                  var html = "";
                  var count = 0;
                  $(data).each(function(k,v){
                             
                                       html += '<a href="<?php echo U('Productdetails/index');?>?type=1&&id='+v.id+'"><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"><img src="'+v.ftimg+'" alt=""></div><div class="team-info"><h4>'+v.ftname+'</h4><p>'+v.fttitle+'</p></div></div></li></a>';
                                       count = v.count;
                                         if(pageyi >= count){
                                           $('#jzgdyi').css('display','none');
                                         }
                                       var name = "'"+hzname+"'";
                  });         
                 //循环完参数后赋值给容器
                 $('#works-list').append(html);
      
            }
    

       });
    
   }



  //频率类型筛选产品一次
  function hztypeptyi(hz,type){
      //频率名称
      $hz = hz;
      
     
      
      //类型名称
      $type = type;

      $.ajax({
          url:"/index.php/Home/Felg/hztypeptyi",
          type:'post',
          dataType:'json',
          data:{felghztype:$type,felghzname:$hz},
          async:true,
          success:function(data){
                                  console.log(data);
                                   $(".yi").addClass("active");
                                  //把产品div元素删除
                                  $('#works-list').empty();

                                  //加载当前类型,清空上一个加载更多
                                  $("#jzgd").empty();
                                  $("#jzgdtype").empty();
                                  $("#jzgdyi").empty();

                                   //追加当前频率的所有产品
                                   var html = "";
                                   //刷选的产品总数
                                   var count = 0;

                                   //频率名称
                                   var hzname = "";

                                   //类型名称
                                   var type = "";
                                   $(data).each(function(k,v){
                                   
                                       html += '<a href="<?php echo U('Productdetails/index');?>?type=1&&id='+v.id+'"><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"><img src="'+v.ftimg+'" alt=""></div><div class="team-info"><h4>'+v.ftname+''+v.hzname+''+v.typename+'</h4><p>'+v.fttitle+'</p></div></div></li></a>';
                                       count = v.count;
                                       
                                       hzname = "'"+v.hzname+"'";
                                       typename = "'"+v.typename+"'";
                                      
                                   });     
                                     
                                    
                                    
                                    if(count > 8){ 
                                          $("#works-list").after('<div id="hztypeyipt" onclick="jiazaihptztypeyi('+hzname+','+typename+')" class="section-title"><h2>To Lode More</h2></div>');
                                     }
                                   $('#works-list').append(html);



                                   //类型点击1.加上样式
                                  $(".typeyiclass").click(function(){  
                                             $(".typeyiclass").removeClass("active");  
                                             $(this).addClass("active");  
                                  })  
                                 
                                 
                           
                            
                              
                            
                       
          }   
      });//ajax结束

     
    
  }


  //第一次加载频率类型产品刷选,加载更多
     //默认页码2
  var pageyihztypept = 1;


  //频率产品的加载更多
  function jiazaihptztypeyi(hzname,typename){

       pageyihztypept++;

       //频率名称
       $hzname = hzname;


      //加载当前类型,清空频率的加载更多
      $("#jzgd").empty();
      //加载当频率的类型产品,清空上一个加载更多
      $("#hztypeyipt").empty();



       //类型名称
       $typename = typename;
 
       $p = pageyihztypept;


       $.ajax({
            type:"post",
            url:"/index.php/Home/Felg/jiazaihptztypes",
            dataType:"json",
            data:{p:$p,hzname:$hzname,typename:$typename},
            success:function(data){
                    console.log(data);
                    var hzname = "";
                    var html = "";
                    var count = 0;
                    $(data).each(function(k,v){
                               
                                         html += '<a href="<?php echo U('Productdetails/index');?>?type=1&&id='+v.id+'"><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"><img src="'+v.ftimg+'" alt=""></div><div class="team-info"><h4>'+v.ftname+'</h4><p>'+v.fttitle+'</p></div></div></li></a>';
                                         count = v.count;
                                           if(pagetype >= count){
                                             $('#hztypeyipt').css('display','none');
                                           }
                                         var name = "'"+hzname+"'";
                    });         
                   //循环完参数后赋值给容器
                   $('#works-list').append(html);
                    
                
      
            }
    

       });
    
   }

  function felghz(type,name,id){
       
    //type类型 1为felg  2为rflinker
     $type = type;
   
   //name  hz名称
   $name = name;
     //刷选对应的类型
     $.ajax({
      url:"/index.php/Home/Felg/felghztypepick",
      type:'post',
      dataType:'json',
      data:{felghztype:$type,felghzname:$name},
      async:true,
      success:function(data){
                   console.log(data);
                   
                   //把类型div元素删除
                   $('#filter_s').empty();

                   
                   //判断类型是否为空
                   if(data == null || data == ''){
                      $('#filter_s').html('<li>暂无类型</li>');
                   }
                   
                   
                   //追加当前频率的类型
                   var html = "";
                 
                       $(data).each(function(k,v){
                           
                           html += '<li onclick="typeptall(1,\''+v.fgtypename+'\',\''+v.hzname+'\')" class="typeclass" data-filter='+v.fgtypename+'>'+v.fgtypename+'</li>';
                           
                       
                       });         
                  
                        $('#filter_s').append(html);
                   
                   
                         //类型点击1.加上样式
                         $(".typeclass").click(function(){  
                                   $(".typeclass").removeClass("active");  
                                   $(this).addClass("active");  
                         })  
          
             }
     });

      

                //根据频率,查找对应的所有产品
                 $.ajax({
                          url:"/index.php/Home/Felg/felghzall",
                          type:'post',
                          dataType:'json',
                          data:{felghztype:$type,felghzname:$name},
                          async:true,
                          success:function(data){
                             console.log(data);
                                
                                  //加上选中样式,删除掉兄弟节点的选中样式
                                  $('#filter'+id).addClass('active').siblings().removeClass('active');

                                  //把产品div元素删除
                                  $('#works-list').empty();


                                  //加载当前类型,清空上一个加载更多
                                  $("#jzgd").empty();
                                  $("#jzgdtype").empty();
                                  $("#jzgdyi").empty();

                                  //判断产品是否为空
                                   if(data == null || data == ''){
                                      $('#works-list').html('<a><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"></div><div class="team-info"><h4></h4><p>暂无产品</p></div></div></li></a>');
                                   }

                                   //追加当前频率的所有产品
                                   var html = "";
                                   //刷选的产品总数
                                   var count = 0;
                                   //当前频率名称
                                   var hzname = "";
                                   $(data).each(function(k,v){
                                   
                                       html += '<a href="<?php echo U('Productdetails/index');?>?type=1&&id='+v.id+'"><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"><img src="'+v.ftimg+'" alt=""></div><div class="team-info"><h4>'+v.ftname+'</h4><p>'+v.fttitle+'</p></div></div></li></a>';
                                       count = v.count;
                                       var name = "'"+hzname+"'";
                                   });         

                                   if(count > 8){ 

                                          $("#works-list").after('<div id="jzgd" onclick="jiazai(\''+name+'\')" class="section-title"><h2>To Lode More</h2></div>');
                                     }
                                  
                                   $('#works-list').append(html);
                            
                              
                            }
                         });//ajax结束

   
    
	   }//函数结束
   
  


  //默认页码2
  var page = 1;


  //频率产品的加载更多
  function jiazai(name){


       page++;

       //频率名称
       $hzname = name;
 
       $p = page;


       $.ajax({
            type:"post",
            url:"/index.php/Home/Felg/Hzgetlist",
            dataType:"json",
            data:{p:$p,hzname:$hzname},
            success:function(data){
            console.log(data);
                  var hzname = "";
                  var html = "";
                  var count = 0;
                  $(data).each(function(k,v){
                             
                                       html += '<a href="<?php echo U('Productdetails/index');?>?type=1&&id='+v.id+'"><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"><img src="'+v.ftimg+'" alt=""></div><div class="team-info"><h4>'+v.ftname+'</h4><p>'+v.fttitle+'</p></div></div></li></a>';
                                       count = v.count;
                                         if(page >= count){
                                           $('#jzgd').css('display','none');
                                         }
                                       var name = "'"+hzname+"'";
                  });         
                 //循环完参数后赋值给容器
                 $('#works-list').append(html);
      
            }
    

       });
    
   }
  















   function typeptall(type,typename,hzname){
            //type类型 1为felg  2为rflinker
            $type = type;
           
            //类型名称
            $name = typename;


            //频率名称
            $hzname = hzname;



            //alert("类型,我是类型");
             //根据频率,查找对应的所有产品
                 $.ajax({
                          url:"/index.php/Home/Felg/typeptall",
                          type:'post',
                          dataType:'json',
                          data:{felghztype:$type,felgtypename:$name,felghzname:$hzname},
                          async:true,
                          success:function(data){
                             console.log(data);
                                      //把产品div元素删除
                                  $('#works-list').empty();


                                  //加载当前类型,清空频率的加载更多
                                  $("#jzgd").empty();
                                  //加载当频率的类型产品,清空上一个加载更多
                                  $("#jzgdtype").empty();
                                  $("#jzgdyi").empty();

                                  //刷选的产品总数
                                   var count = 0;

                                  //判断产品是否为空
                                   if(data == null || data == ''){
                                      $('#works-list').html('<a><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"></div><div class="team-info"><h4></h4><p>暂无产品</p></div></div></li></a>');
                                   }

                                   //追加当前频率的所有产品
                                   var html = "";
                    
                                   
                            
                                   //刷选的产品总数
                                   var count = 0;
                                   $(data).each(function(k,v){
                                   
                                       html += '<a href="<?php echo U('Productdetails/index');?>?type=1&&id='+v.id+'"><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"><img src="'+v.ftimg+'" alt=""></div><div class="team-info"><h4>'+v.ftname+'</h4><p>'+v.fttitle+'</p></div></div></li></a>';
                                       count = v.count;
                                       var hzname = "'"+hzname+"'";
                                       var typename = "'"+typename+"'";
                                   });     


                                    if(count > 8){ 

                                          $("#works-list").after('<div id="jzgdtype" onclick="jiazaitype(\''+hzname+'\',\''+typename+'\')" class="section-title"><h2>To Lode More</h2></div>');
                                     }    
                                  
                                   $('#works-list').append(html);
                              
                              
                            }
                });//ajax结束
  


   }//函数结束



   

    //默认页码2
  var pagetype = 1;


  //频率产品的加载更多
  function jiazaitype(hzname,typename){

      
       pagetype++;

       //频率名称
       $hzname = hzname;


      //加载当前类型,清空频率的加载更多
      $("#jzgd").empty();
      //加载当频率的类型产品,清空上一个加载更多
      $("#jzgdtype").empty();



       //类型名称
       $typename = typename;
 
       $p = pagetype;


       $.ajax({
            type:"post",
            url:"/index.php/Home/Felg/HzTypegetlist",
            dataType:"json",
            data:{p:$p,hzname:$hzname,typename:$typename},
            success:function(data){
                    console.log(data);
                    var hzname = "";
                    var html = "";
                    var count = 0;
                    $(data).each(function(k,v){
                               
                                         html += '<a href="<?php echo U('Productdetails/index');?>?type=1&&id='+v.id+'"><li class="mix graphic mix_all" style="display: inline-block; opacity: 1;"><div class="team animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0"><div class="team-photo"><img src="'+v.ftimg+'" alt=""></div><div class="team-info"><h4>'+v.ftname+'</h4><p>'+v.fttitle+'</p></div></div></li></a>';
                                         count = v.count;
                                           if(pagetype >= count){
                                             $('#jzgdtype').css('display','none');
                                           }
                                         var name = "'"+hzname+"'";
                    });         
                   //循环完参数后赋值给容器
                   $('#works-list').append(html);
      
            }
    

       });
    
   }


</script>

   

<!--下方滚动js-->
<script src="/Public/qiantai/js/scrollfix.js"></script>


<script type="text/javascript">
  var language = "<?php echo (L("language")); ?>";
  if(language=='cn_'){
    $("#china").css({"color":"rgb(0,170,240)","font-size":"18px"});
    $("#mobilechina").css({"color":"rgb(0,170,240)"});
  }else if(language=='en_'){
    $("#english").css({"color":"rgb(0,170,240)","font-size":"18px"});
    $("#mobileenglish").css({"color":"rgb(0,170,240)"});
  }
</script>


</body>
</html>