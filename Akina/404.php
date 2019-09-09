<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("THEME_URL", $this->options->themeUrl);
	if(!empty(Helper::options()->CDNURL)){
		$theurl = Helper::options()->CDNURL.'/AkinaCDN/';
	}else{
		$theurl = THEME_URL.'/';
	}
define("theurl",$theurl); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-Control" content="no-transform" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<title itemprop="name">页面没有找到-<?php $this->options->title(); ?></title>
	<link rel="shortcut icon" href="<?php echo theurl; ?>images/favicon.ico">
	<link rel="stylesheet" href="<?php echo theurl; ?>css/style.css" type="text/css" />
</head>
<body class="error404 hfeed">
	<section class="error-404 not-found">
		<div class="error-img">
			<img src="<?php echo theurl; ?>images/404bg.jpg">
		</div>
		<div class="err-button back">
			<a href="javascript:history.go(-1)" class="link-button link-back-button">上一页</a>
			<a id="gohome" href="<?php $this->options ->siteUrl(); ?>">返回主页</a>
		</div>
	</section>
</body>