<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title><?php echo (C("sitename")); ?></title>
<!--link rel="stylesheet" type="text/css" href="<?php echo (C("URL")); ?>/style.css" />
<script type="text/javascript" src="<?php echo (C("URL")); ?>/js.js"></script-->
<meta name="keywords" content="<?php echo (C("keywords")); ?>" />
<meta name="description" content="<?php echo (C("description")); ?>" />
<script src="/Public/js/jquery-1.9.1.min.js"></script>
<style>
#searchresult{width:302px; position:absolute; left:618px; top:180px; 
z-index:1; overflow:hidden; background:#dcf6f8; border:#c5dadb 1px solid;
border-top:none;
}
.line{font-size:12px; color:#000; background:#aed34f; width:302px; padding:2px;}
.hover{background:#007ab8; color:#fff;}
#mydiv{
   position:absolute;
   left:50%;
   top:50%;
   margin-left:-200px;
   margin-top:-50px;
}
.hover{
  background:red;
}
</style>
</head>
<body>

   <div id="mydiv">
       <!-- 输入框 -->
	   <input type="text" size="50" id="keyword" onkeyup="getMoreContents()"/>
	   <input type="button" value="百度一下" width="50px"/>
	   
	   <!-- 下面是内容展示的区域 -->
	   <div id="popDiv">
	          <table id="content_table" bgcolor="#FFFAFA" border="0" cellspacing="0" cellpadding="0">
			       <tbody id="content_table_body">
				     <!-- 动态查询出来的数据显示在这个地方 -->
				     
				   </tbody>
			  
			  </table>
	   </div>
   </div>

   <div>
       <span id="email">预约</span>
   </div>








<script type="text/javascript">
      //获取用户输入内容的关联信息的函数
	  function getMoreContents(){
	      //首先要获得用户的输入内容
		  var content = $('#keyword').val();
		  
		  if(content == ""){
		      return;
		  }
		 $content = content;
		 
		 $.ajax({
		       url:"/index.php/Home/Cs/search",
			   type:'post',
			   dataType:'json',
			   data:{contents:$content},
			   success:function(data){
			      console.log(data);
				  
				  var html = "";
 	              $(data).each(function(k,v){ 
				      html += '<tr><td  class="line" border="0" bgcolor="#FFFAFA">'+v.felgname+'</td></tr>';
			      });
				  
				  $('#content_table_body').empty();  //先清空#content_table_body下的所有子元素
				  $("#content_table_body").append(html);
				  
				  $('.line').hover(function(){  //监听提示框的鼠标悬停事件
					 $(this).addClass("hover"); 
				  },function(){
					 $(this).removeClass("hover");
				  });
				  
				  $('.line').click(function(){  //监听提示框的鼠标单击事件
                     $('#keyword').val($(this).text());
					 window.location.href = "http://www.jb51.net";
                  });
			   }
		 
		 
		 });
		  
		  
		 
	      
	  }

 

</script>




<script>
    //点击预约，发送邮件
	$("#email").click(function(){
	alert("aaa");
	$to = 1;

	   $.ajax({
		       url:"/index.php/Home/Cs/email",
			   type:'post',
			   dataType:'json',
			   data:{to:$to},
			   success:function(data){
			      console.log(data);
				  
				
				alert("成功!!!");
			   }
		 
		 
		 });
	    
	
  });
</script>

</body>
</html>