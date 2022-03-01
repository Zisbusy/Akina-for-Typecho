<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("THEME_URL", $this->options->themeUrl);
	if(!empty(Helper::options()->CDNURL)){
		$theurl = Helper::options()->CDNURL.'/usr/themes/Akina/';
	}else{
		$theurl = THEME_URL.'/';
	}
define("theurl",$theurl);
define("theprofile", authorProfile($this->options->profile,theurl));
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-transform" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta http-equiv="x-dns-prefetch-control" content="on" />
	<title itemprop="name"><?php $this->archiveTitle(array('category'=>_t('%s - 分类'),'search'=>_t('%s - 搜索结果'),'tag' =>_t('%s - 标签'),'author'=>_t('%s的主页')), '', ' - '); ?><?php $this->options->title(); ?><?php if($this->is('index')): ?><?php if($this->options->sub){echo ' - '.$this->options->sub;} ?><?php endif; ?></title>
	<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw='); ?>
	<link rel='dns-prefetch' href="<?php $this->options->DNS();?>" />
	<?php echo '
	<link rel="shortcut icon" href="'.theurl.'images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="'.theurl.'css/style.css" type="text/css" />
	<link rel="stylesheet" href="'.theurl.'css/OwO.css" type="text/css" />';
	if (!empty($this->options->menu) && in_array('dark', $this->options->menu)) {
		echo '<link rel="stylesheet" href="'.theurl.'css/dark.css" type="text/css" />';
	}
	?>
  <!-- 个性化选项 CSS 代码 -->
  <?php $this->need('style.php'); ?>
  <!-- 自定义 CSS 代码 -->
	<?php $this->options->cssCode();?>
</head>
<body class="home blog hfeed">
<!-- 加载动画 -->
<div id="preloader">
	<div id="preloader-inner"></div>
</div>
<section id="main-container">
	 <div class="openNav">
		<div class="iconflat">	 
			 <div class="icon"></div>
		</div>
			<!-- logo则显示 -->
			<div class="site-branding">
			 <div class="site-title"><a href="<?php $this->options ->siteUrl(); ?>" ><img src="<?php echo authorProfile($this->options->logo,theurl);?>"></a></div>		  
			</div>
			<!-- logo 结束 -->
	 </div>	
	 <!-- 主页面显示 -->
<div id="page" class="site wrapper">
<header class="site-header" role="banner">
	<div class="site-top">
		<!-- logo则显示 -->
		<div class="site-branding">
		<div class="site-title"><a href="<?php $this->options ->siteUrl(); ?>" ><img src="<?php echo authorProfile($this->options->logo,theurl);?>"></a></div>		  
		</div>
		<!-- logo 结束 -->
		<div id="login-reg">
			<!-- 个人头像 -->
			<?php if($this->user->hasLogin()): ?>
			<!-- 如果用户已经登录 -->
			<div class="exloginbox">
				<a href="#" class="user-panel"><img alt="avatar" src="<?php echo theprofile ?>" srcset="<?php echo theprofile ?> 2x" class="avatar avatar-110 photo" height="110" width="110"></a>
				<div class="user_inner">
				<ul>
				<li><a href="<?php $this->options->adminUrl(); ?>" class="user-manage">管理后台</a></li>
				<li><a href="<?php $this->options->logoutUrl(); ?>" class="user-logout">登出</a></li>
				</ul>
				</div>
			</div>
			<?php else: ?>
			<!-- 如果用户未登录 -->
			<div class="ex-login">
				<a href="<?php $this->options->adminUrl(); ?>" target="_top">
					<i class="iconfont">&#xe615;</i>
				</a>
			</div>
			<?php endif; ?>
		</div>
		<!-- 搜索 -->
		<div class="searchbox">
			<i class="iconfont js-toggle-search iconsearch">&#xe6f0;</i>
		</div> 
		<!-- 分类 -->
		<div class="lower">
			<nav>
				<ul class="menu"><li class="current-menu-item"><a href="<?php $this->options ->siteUrl(); ?>">首页</a></li>
				<li><a href="#">分类</a>
				<ul class="sub-menu">
					<?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
				</ul>
				</li>
				<li><a href="#">更多</a>
				<ul class="sub-menu">
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
					<?php while($pages->next()): ?>
						<li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
				</li>
				</ul>
				<!-- 隐藏后菜单图标 -->
				<i class="iconfont show-nav">&#xe613;</i>
			</nav>
		</div>
	</div>
	<!-- 到顶部按钮 -->
	<div class="cd-top-box">
	<a href="#" class="cd-top"></a>
	</div>
</header>
