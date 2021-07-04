<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<!-- 请尊重作者！至少保留主题名称及其超链接，谢谢！ -->
	<div id="footer" class="site-info">Copyright © <?php echo date("Y");?> by <a href="<?php $this->options ->siteUrl(); ?>" target="_blank" rel="nofollow"><?php $this->options->title() ?></a> - All rights reserved<span class="sep"> | </span>Theme : <a href="https://zhebk.cn/Web/Akina.html" target="_blank" rel="nofollow">Akina For Typecho</a>
		<div class="footertext">
			<p><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow"><?php $this->options->ICP();?></a></p>
			<?php if ($this->options->gongan){
			    echo '
			    <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode='.gonganbeian($this->options->gongan).'" style="display:inline-block;" rel="nofollow noopener noreferrer">
			    <img src="'.theurl.'images/gongan.png" style="float: left;height: 17px;">
			    <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px;">'.$this->options->gongan.'</p>
			    </a>
			    ';
			}?>
		</div>
	</div>
</footer>
<div id="mo-nav">
	<div class="m-avatar">
		<img src="<?php echo theprofile ?>">
	</div>
	<div class="m-search">
		<form class="m-search-form" method="post" action="" role="search">
			<input class="m-search-input" type="search" name="s" placeholder="搜索...">
		</form>
	</div>
	<ul id="nav_menu" class="menu">
		<li class="current-menu-item"><a href="<?php $this->options ->siteUrl(); ?>">首页</a></li>
		<li><a href="#">分类</a>
			<ul class="sub-menu">
				<?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
			</ul>
		</li>
		<li><a href="#">更多</a>
			<ul class="sub-menu">
				<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
				<?php while($pages->next()): ?>
					<?php if ($pages->fields->navbar == "hide") continue; ?>
					<li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
		</li>
	</ul>
</div>
<!-- 搜索 -->
<form class="js-search search-form search-form--modal" method="post" action="" role="search">
	<div class="search-form__inner">
		<div class="search-div">
			<h1 class="micromb-search">你想搜索什么...</h1>
			<i class="iconfont">&#xe6f0;</i>
			<input class="submit" type="search" name="s" placeholder="Search...">
		</div>
	</div>
</form>
<!-- 搜索结束 -->
<script type="text/javascript">
	var app = {"pjax":""};
	var theurl = "<?php echo theurl; ?>";
	if (!!window.ActiveXObject || "ActiveXObject" in window) { //is IE?
	  alert('请抛弃万恶的IE系列浏览器吧。');
	}
	//判断下拉加载
	<?php if (!empty($this->options->menu) && in_array('xl', $this->options->menu)): ?>var xl = "1";<?php else: ?> var xl = "0";<?php endif; ?>
</script>
<?php echo '
<script type="text/javascript" src="'.theurl.'js/jquery.min.js"></script>
<script type="text/javascript" src="'.theurl.'js/jquery.preloader.js"></script>
<script type="text/javascript" src="'.theurl.'js/jquery.pjax.js"></script>
<script type="text/javascript" src="'.theurl.'js/baguetteBox.min.js"></script>
<script type="text/javascript" src="'.theurl.'js/global.js"></script>
<script type="text/javascript" src="'.theurl.'js/prism.js"></script>
<script type="text/javascript" src="'.theurl.'js/SmoothScroll.js"></script>
';?>
<?php $this->footer(); ?>
</body>
</html>
