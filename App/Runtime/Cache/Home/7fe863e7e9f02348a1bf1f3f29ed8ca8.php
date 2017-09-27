<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title><?php echo (C("sitename")); ?></title>
<!--link rel="stylesheet" type="text/css" href="<?php echo (C("URL")); ?>/style.css" />
<script type="text/javascript" src="<?php echo (C("URL")); ?>/js.js"></script-->
<meta name="keywords" content="<?php echo (C("keywords")); ?>" />
<meta name="description" content="<?php echo (C("description")); ?>" />
<script src="/guanwang/qwadmin/Public/js/jquery-1.9.1.min.js"></script>
<style>
#searchresult{width:302px; position:absolute; left:618px; top:180px; 
z-index:1; overflow:hidden; background:#dcf6f8; border:#c5dadb 1px solid;
border-top:none;
}
.line{font-size:12px; color:#000; background:#aed34f; width:302px; padding:2px;}
.hover{background:#007ab8; color:#fff;}
</style>
</head>
<body>
﻿  <div id="language">

      <a href="<?php echo U('?lang=ch-cn');?>">中文</a>
	  <a href="<?php echo U('?lang=en-us');?>">English</a>

  </div>

<a href="<?php echo U('index/index');?>">第一页</a>
<?php echo (L("eryetitle")); ?>


 


<script type="text/javascript" src="/js/jquery-1.3.pack.js"></script>


<script type="text/javascript">
$(document).ready(function(){
 $('#search').keyup(function(){   //输入框的id为search，这里监听输入框的keyup事件
  $.ajax({
   type:"GET",     //AJAX提交方式为GET提交
   url:"/include/ajax_search.php",   //处理页的URL地址
   data:"txt_search="+escape($('#search').val()),   //要传递的参数
   success:function(data){   //成功后执行的方法
   if(data != ""){
    var ss;
    ss = data.split("@");   //分割返回的字符串
    var layer;
    layer = "<table>";     //创建一个table
    for(var i=0;i<ss.length-1;i++){
     layer += "<tr><td class='line'>"+ss[i]+"</td></tr>";
    }
    layer += "</table>";
    $('#searchresult').empty();  //先清空#searchresult下的所有子元素
    $('#searchresult').append(layer);//将刚才创建的table插入到#searchresult内
    $('.line').hover(function(){  //监听提示框的鼠标悬停事件
     $(this).addClass("hover"); 
    },function(){
     $(this).removeClass("hover");
    });
    $('.line').click(function(){  //监听提示框的鼠标单击事件
     $('#search').val($(this).text());
    });
   }else{
    $('#searchresult').empty();
   }
   },
   error:function(){alert("O No~~~");}
  });
 });
});

$(document).ready(function(){
 $().click(function(){
  $('#searchresult').empty();
 });
});
</script>
<input type="text" id="searchresult">
<input type="buttton" class="line">
</body>
</html>