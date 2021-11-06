<?php
/**
 * 自定义首页模板
 *
 * @package index
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("THEME_URL", $this->options->themeUrl);
	if(!empty(Helper::options()->CDNURL)){
        $theurl = rtrim(Helper::options()->CDNURL,"/")."/";
	}else{
		$theurl = THEME_URL.'/';
	}
define("theurl",$theurl); 
$this->need('functions.php');
define("theprofile", authorProfile($this->options->profile,theurl));
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-Control" content="no-transform" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<title itemprop="name"><?php $this->options->title(); ?><?php if($this->options->sub){echo ' - '.$this->options->sub;} ?></title>
	<link rel="canonical" href="<?php $this->options ->siteUrl(); ?>" />
	<link rel="shortcut icon" href="<?php echo theurl; ?>images/favicon.ico">
	<link rel="stylesheet" href="<?php echo theurl; ?>css/style.css" type="text/css" />
	<style type="text/css">body {background: #181717 !important;}::-webkit-scrollbar-track{background-color: #181717;}</style>
</head>
<body class="home page-template page-template-welcome page-template-welcome-php page page-id-7 logged-in">
<div class="welcome-wrapper">
	<header id="we-header">
		<div class="we-branding">
			<div class="wesite-title">
				<a href="<?php $this->options ->siteUrl(); ?>" ><img src="<?php echo theurl; ?>images/akina.png"></a>
			</div>
			<div class="wesite-des">		
				<p><?php $this->options->title(); ?><?php if($this->options->sub){echo ' - '.$this->options->sub;} ?></p>
			</div>
		</div>	
		<div class="admin-login">
			<a href="<?php $this->options->adminUrl(); ?>"><span></span><?php if($this->user->hasLogin()): ?>已登陆<?php else: ?>LOGIN<?php endif; ?></a>
		</div>		
	</header>
	<ul class="we-content">
		<li class="we-menu1">
			<a href="<?php $this->options ->siteUrl(); ?>blog"><span class="we-home we-icon"></span>
			   <span class="we-title wtitle">HOME</span>
			   <span class="sub-text">It's Welcome Page</span>
			   <div class="bottom-line"></div>
			</a>
		</li>
		<li class="we-menu2">
			<a href="<?php $this->options ->siteUrl(); ?>about.html"><span class="we-about we-icon"></span>
			   <span class="we-title wtitle">about</span>
			   <span class="sub-text">who im i</span>
			   <div class="bottom-line"></div>
			</a>
		</li>
		<li class="we-menu3">
			<a href="<?php $this->options ->siteUrl(); ?>links.html"><span class="we-links we-icon"></span>
			   <span class="we-title wtitle">links</span>
			   <span class="sub-text">hi! friends</span>
			   <div class="bottom-line"></div>
			</a>
		</li>
		<li class="we-menu4">
			<a href="<?php $this->options ->siteUrl(); ?>archives.html"><span class="we-archives we-icon"></span>
			   <span class="we-title wtitle">archives</span>
			   <span class="sub-text">all my posts</span>
			   <div class="bottom-line"></div>
			 </a>
		</li>
		<li class="we-menu5">
			<a href="<?php $this->options ->siteUrl(); ?>message.html"><span class="we-youset we-icon"></span>
			   <span class="we-title wtitle">message</span>
			   <span class="sub-text">Leave a message for me</span>
			   <div class="bottom-line"></div>
			</a>
		</li>
	</ul>
</div>
<div class="author-box">
	<div class="we-avatar">
		<div class="header-tou" >
			<a href="<?php $this->options ->siteUrl(); ?>"><img src="<?php echo theprofile ?>"></a>
		</div>	
	</div>
	<div class="author-content">
		<div class="we-visible">
			<p>Hello</p>
			<ul>
				<li>My friends !</li>
				<li>Welcome to !</li>
				<li>My blog !</li>
				<li>Thanks !</li>
			</ul>
		</div>	
	</div>	
</div>	
<div class="we-footer">
	<div class="we-info">Copyright © <?php echo date("Y");?> by <a href="<?php $this->options ->siteUrl(); ?>" target="_blank" rel="nofollow"><?php $this->options->title() ?></a> - All rights reserved <span class="sep"> | </span>Theme: <a href="https://zhebk.cn/Web/Akina.html" target="_blank" rel="nofollow" rel="designer">Akina For Typecho</a>
		<div class="we-footertext">
			<p><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow"><?php $this->options->ICP();?></a></p>
			<?php if ($this->options->gongan){
			    echo '
			    <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode='.gonganbeian($this->options->gongan).'" style="display:inline-block;" rel="nofollow noopener noreferrer">
			    <img src="'.theurl.'images/gongan.png" style="float:left;">
			    <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px;">'.$this->options->gongan.'</p>
			    </a>
			    ';
			}?>
		</div>
	</div>
</div>
<script type="text/javascript">
if (!!window.ActiveXObject || "ActiveXObject" in window) { //is IE?
  alert('请抛弃万恶的IE系列浏览器吧。');
}
</body>
