<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo ($current['title']); ?>-<?php echo (C("title")); ?></title>

		<meta name="keywords" content="<?php echo (C("keywords")); ?>" />
		<meta name="description" content="<?php echo (C("description")); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

				<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/Public/qwadmin/css/bootstrap.css" />
		<link rel="stylesheet" href="/Public/qwadmin/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="/Public/qwadmin/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/Public/qwadmin/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/Public/qwadmin/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/Public/qwadmin/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="/Public/qwadmin/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/Public/qwadmin/js/html5shiv.js"></script>
		<script src="/Public/qwadmin/js/respond.js"></script>
		<![endif]-->
   </head>

	<body class="no-skin">
				<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="<?php echo U('index/index');?>" class="navbar-brand">
						<small>
							<i class="fa fa-home"></i>
							<?php echo (C("title")); ?>
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<!-- #section:basics/navbar.user_menu -->
						<li class="red">
							<a href="/" title="前台首页" target="_blank">
								<i class="ace-icon fa fa-home"></i>
							</a>
						</li>
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php if( $user["head"] == '' ): ?>/Public/qwadmin/avatars/avatar2.png<?php else: ?><?php echo ($user["head"]); endif; ?>" alt="<?php echo ($user["user"]); ?>" />
								<span class="user-info">
									<small>欢迎光临，</small>
									<?php echo ($user["user"]); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo U('Setting/Setting');?>">
										<i class="ace-icon fa fa-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="<?php echo U('Personal/profile');?>">
										<i class="ace-icon fa fa-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo U('logout/index');?>">
										<i class="ace-icon fa fa-power-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div style="display:none;" class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div  class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if(($v['id'] == $current['id']) OR ($v['id'] == $current['pid']) OR ($v['id'] == $current['ppid'])): ?>class="active  <?php if($current['pid'] != '0'): ?>open<?php endif; ?>"<?php endif; ?>>
						<a href="<?php if(empty($v["name"])): ?>#<?php else: echo U($v['name']); endif; ?>" <?php if(!empty($v["children"])): ?>class="dropdown-toggle"<?php endif; ?>>
							<i class="<?php echo ($v["icon"]); ?>"></i>
							<span class="menu-text">
								<?php echo ($v["title"]); ?>
							</span>
							<?php if(!empty($v["children"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
						</a>

						<b class="arrow"></b>
						<?php if(!empty($v["children"])): ?><ul class="submenu">
							<?php if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li <?php if(($vv['id'] == $current['id']) OR ($vv['id'] == $current['pid'])): ?>class="active <?php if($current['ppid'] != '0'): ?>open<?php endif; ?>"<?php endif; ?>>
								<a href="<?php if(empty($vv["children"])): echo U($vv['name']); else: ?>#<?php endif; ?>" <?php if(!empty($vv["children"])): ?>class="dropdown-toggle"<?php endif; ?>>
									<i class="<?php echo ($vv["icon"]); ?>"></i>
									<?php echo ($vv["title"]); ?>
									<?php if(!empty($vv["children"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
								</a>

								<b class="arrow"></b>
								<?php if(!empty($vv["children"])): ?><ul class="submenu">
									<?php if(is_array($vv["children"])): $i = 0; $__LIST__ = $vv["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><li <?php if($vvv['id'] == $current['id']): ?>class="active"<?php endif; ?>>
											<a href="<?php echo U($vvv['name']);?>">
												<i class="<?php echo ($vvv["icon"]); ?>"></i>
												<?php echo ($vvv["title"]); ?>
											</a>
											<b class="arrow"></b>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
									</ul><?php endif; ?>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul><?php endif; ?>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo U('index/index');?>">首页</a>
							</li>
							<li class="active">修改首页轮播图</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php if($current["tips"] != ''): ?><div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
							<!--i class="ace-icon fa fa-check green"></i-->
							<?php echo ($current["tips"]); ?>
						</div><?php endif; ?>
						<div class="ace-settings-container" id="ace-settings-container">
							<div style = "display:none;" class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div  style="display:none;" class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<!-- #section:settings.skins -->
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; 选择皮肤</span>
									</div>

									<!-- /section:settings.skins -->

									<!-- #section:settings.navbar -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> 固定导航条</label>
									</div>

									<!-- /section:settings.navbar -->

									<!-- #section:settings.sidebar -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> 固定侧边栏</label>
									</div>

									<!-- /section:settings.sidebar -->

									<!-- #section:settings.breadcrumbs -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> 固定面包屑</label>
									</div>

									<!-- /section:settings.breadcrumbs -->

									<!-- #section:settings.rtl -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> 切换至左边</label>
									</div>

									<!-- /section:settings.rtl -->

									<!-- #section:settings.container -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											切换宽窄度
										</label>
									</div>

									<!-- /section:settings.container -->
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<!-- #section:basics/sidebar.options -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> 子菜单收起</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> 侧边栏紧凑</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> 当前位置</label>
									</div>

									<!-- /section:basics/sidebar.options -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<!-- /section:settings.box -->
						<div class="row">
							<div class="col-xs-12">	
								<!-- PAGE CONTENT BEGINS -->
									<form class="form-horizontal" id="form" method="post" action="<?php echo U('update');?>?id=<?php echo ($link["id"]); ?>">

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文行业名称 </label>
										<div class="col-sm-9">
											<input type="url" name="cn_nameiy" id="url" placeholder="中文行业名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['cn_nameiy']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
											</span>
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">中文行业缩略图</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("cn_imgiy",88,31,$link['cn_imgiy']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									

									
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文行业缩略图是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="cn_iyshowimg" <?php if($link['cn_iyshowimg'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="cn_iyshowimg" <?php if($link['cn_iyshowimg'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文行业介绍</label>
										<div class="col-sm-9">
											<textarea cols="70" rows="13"  name="cn_iycontent" id="cn_iycontent"><?php echo ($link['cn_iycontent']); ?></textarea>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">中文行业好友公司logo</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("cn_iylogo",88,31,$link['cn_iylogo']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文好友logo是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="cn_logoshow" <?php if($link['cn_logoshow'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="cn_logoshow" <?php if($link['cn_logoshow'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文行业好友公司logo链接 </label>
										<div class="col-sm-9">
											<input type="url" name="cn_linksiy" id="url" placeholder="行业好友公司logo" class="col-xs-10 col-sm-5" value="<?php echo ($link['cn_linksiy']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
								
											</span>
										</div>
									</div>
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文经典案例1名称 </label>
										<div class="col-sm-9">
											<input type="url" name="cn_anliname1" id="url" placeholder="中文经典案例1名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['cn_anliname1']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
								
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">中文经典案例1</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("cn_anli1",88,31,$link['cn_anli1']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文经典案例1是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="cn_anli1show" <?php if($link['cn_anli1show'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="cn_anli1show" <?php if($link['cn_anli1show'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文经典案例2名称 </label>
										<div class="col-sm-9">
											<input type="url" name="cn_anliname2" id="url" placeholder="中文经典案例2名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['cn_anliname2']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
								
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">中文经典案例2</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("cn_anli2",88,31,$link['cn_anli2']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文经典案例2是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="cn_anli2show" <?php if($link['cn_anli2show'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="cn_anli2show" <?php if($link['cn_anli2show'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文经典案例3名称 </label>
										<div class="col-sm-9">
											<input type="url" name="cn_anliname3" id="url" placeholder="中文经典案例3名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['cn_anliname3']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
								
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">中文经典案例3</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("cn_anli3",88,31,$link['cn_anli3']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 中文经典案例3是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="cn_anli3show" <?php if($link['cn_anli3show'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="cn_anli3show" <?php if($link['cn_anli3show'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									
									<br/><br/>
									<hr/>
									<br/><br/>
									
									
									
									
									
									
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文行业名称 </label>
										<div class="col-sm-9">
											<input type="url" name="en_nameiy" id="url" placeholder="英文行业名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['en_nameiy']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
											</span>
										</div>
									</div>
									

									
									
								
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">英文行业缩略图</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("en_imgiy",88,31,$link['en_imgiy']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文行业缩略图是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="en_iyshowimg" <?php if($link['en_iyshowimg'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="en_iyshowimg" <?php if($link['en_iyshowimg'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									
									
									
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文行业介绍</label>
										<div class="col-sm-9">
											<textarea cols="70" rows="13"  name="en_iycontent" id="en_iycontent"><?php echo ($link['en_iycontent']); ?></textarea>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
																	
									
									
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">英文行业好友公司logo</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("en_iylogo",88,31,$link['en_iylogo']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文好友logo是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="en_logoshow" <?php if($link['en_logoshow'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="en_logoshow" <?php if($link['en_logoshow'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文行业链接 </label>
										<div class="col-sm-9">
											<input type="url" name="en_linksiy" id="url" placeholder="英文行业链接" class="col-xs-10 col-sm-5" value="<?php echo ($link['en_linksiy']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文经典案例1名称 </label>
										<div class="col-sm-9">
											<input type="url" name="en_anliname1" id="url" placeholder="英文经典案例1名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['en_anliname1']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">英文经典案例1</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("en_anli1",88,31,$link['en_anli1']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文经典案例1是否开启 </label>
										<div class="col-sm-9">

											<input type="radio" name="en_anli1show" <?php if($link['en_anli1show'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="en_anli1show" <?php if($link['en_anli1show'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启
											
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文经典案例2名称 </label>
										<div class="col-sm-9">
											<input type="url" name="en_anliname2" id="url" placeholder="英文经典案例2名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['en_anliname2']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									
									
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">英文经典案例2</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("en_anli2",88,31,$link['en_anli2']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文经典案例2是否开启 </label>
										<div class="col-sm-9">
											<input type="radio" name="en_anli2show" <?php if($link['en_anli2show'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="en_anli2show" <?php if($link['en_anli2show'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启										
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
									
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文经典案例3名称 </label>
										<div class="col-sm-9">
											<input type="url" name="en_anliname3" id="url" placeholder="英文经典案例3名称" class="col-xs-10 col-sm-5" value="<?php echo ($link['en_anliname3']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
												
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-4">英文经典案例3</label>
										<div class="col-sm-9">
											<div class="col-xs-10 col-sm-5"><?php echo UpImage("en_anli3",88,31,$link['en_anli3']);?></div>
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、png，且小于1MB。</span>
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 英文经典案例3是否开启 </label>
										<div class="col-sm-9">

											<input type="radio" name="en_anli3show" <?php if($link['en_anli3show'] == 1): ?>checked="checked" <?php else: endif; ?>  value="1">开启&nbsp;&nbsp;
											<input type="radio" name="en_anli3show" <?php if($link['en_anli3show'] == 2): ?>checked="checked" <?php else: endif; ?>  value="2">不开启										
											
											<span>
												<span class="middle"></span>
											</span>
										</div>
									</div>
									
						
										
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 排序 </label>
										<div class="col-sm-9">
											<input type="number" name="iysort" id="o" placeholder="排序" class="col-xs-10 col-sm-5" value="<?php echo ($link['iysort']); ?>">
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">越小越靠前。</span>
											</span>
										</div>
									</div>

									<div class="col-md-offset-2 col-md-9">
										<button class="btn btn-info submit" type="button">
											<i class="icon-ok bigger-110"></i>
											提交
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="icon-undo bigger-110"></i>
											重置
										</button>
									</div>
								</form>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
						<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<small>Copyright &copy; 2017 <a href="http://www.qiawei.com" target="_blank">Rflinker官网</a> </small>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
			
		</div><!-- /.main-container -->
<script type="text/javascript" src="/Public/ckeditor/ckeditor.js"></script>
				<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/qwadmin/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/Public/qwadmin/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/Public/qwadmin/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="/Public/qwadmin/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<script charset="utf-8" src="/Public/kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/Public/kindeditor/lang/zh_CN.js"></script>
		<script src="/Public/qwadmin/js/bootbox.js"></script>
		<!-- ace scripts -->
		<script src="/Public/qwadmin/js/ace/elements.scroller.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.colorpicker.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.fileinput.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.typeahead.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.wysiwyg.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.spinner.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.treeview.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.wizard.js"></script>
		<script src="/Public/qwadmin/js/ace/elements.aside.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.ajax-content.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.touch-drag.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.sidebar.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.submenu-hover.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.widget-box.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.settings.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.settings-rtl.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.settings-skin.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.widget-on-reload.js"></script>
		<script src="/Public/qwadmin/js/ace/ace.searchbox-autocomplete.js"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		$(function() {
			$(".btn-info.submit").click(function(){
				var webname = $("#webname").val();
				var url = $("#url").val();
				
					
				$("#form").submit();
			});
		});
		
		
		</script>
		
		<script type="text/javascript">
				CKEDITOR.replace('cn_iycontent',{
					toolbar : 'Full',
					uiColor : '#9AB8F3',
					height:'200'
				});
				
				
				CKEDITOR.replace('en_iycontent',{
					toolbar : 'Full',
					uiColor : '#9AB8F3',
					height:'200'
				});
        </script>
	</body>
</html>