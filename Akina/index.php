<?php
/**
 * Akina For Typecho移植于WordPress的Akina模板，原作者为 Fuzzz 
 * 
 * @package Akina For Typecho
 * @author 子虚之人
 * @version 3.4.3
 * @link https://zhebk.cn/
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 /** 文章置顶 */
if($this->options->sticky){
	$sticky = $this->options->sticky; //置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔
	if($sticky && $this->is('index') || $this->is('front')){
	    $sticky_cids = explode(',', strtr($sticky, ' ', ','));//分割文本 
	    $sticky_html = "<span style='color:#ff6d6d;font-weight:600'>[置顶] </span>"; //置顶标题的 html css
	    $db = Typecho_Db::get();
	    $pageSize = $this->options->pageSize;
	    $select1 = $this->select()->where('type = ?', 'post');
	    $select2 = $this->select()->where('type = ? AND status = ? AND created < ?', 'post','publish',time());
	    //清空原有文章的列队
	    $this->row = [];
	    $this->stack = [];
	    $this->length = 0;
	    $order = '';
	    foreach($sticky_cids as $i => $cid) {
		if($i == 0) $select1->where('cid = ?', $cid);
		else $select1->orWhere('cid = ?', $cid);
		$order .= " when $cid then $i";
		$select2->where('table.contents.cid != ?', $cid); //避免重复
	    }
	    if ($order) $select1->order(null,"(case cid$order end)"); //置顶文章的顺序 按 $sticky 中 文章ID顺序
	    if ($this->_currentPage == 1) foreach($db->fetchAll($select1) as $sticky_post){ //首页第一页才显示
		$sticky_post['sticky'] = $sticky_html;
		$this->push($sticky_post); //压入列队
	    }
		$uid = $this->user->uid; //登录时，显示用户各自的私密文章
	    if($uid) $select2->orWhere('authorId = ? AND status = ?',$uid,'private');
	    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
	    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); //压入列队
	    $this->setTotal($this->getTotal()-count($sticky_cids)); //置顶文章不计算在所有文章内
	}
}
?>
<div class="blank"></div>
	<div class="headertop">
		<!-- 首页大图 -->
		<div id="centerbg" style="background-image: url(<?php echo authorProfile($this->options->headimg,theurl);?>);">
			<!-- 左右倾斜 -->
			<div class="slant-left"></div>
			<div class="slant-right"></div>
			<!-- 博主信息 -->
			<div class="focusinfo">
				<!-- 头像 -->
				<div class="header-tou" >
				<a href="<?php $this->options ->siteUrl(); ?>"><img src="<?php echo theprofile ?>"></a>
				</div>
				<!-- 简介 -->
				<div class="header-info">
				<p><?php $this->options->headerinfo() ?></p>
				</div>
				<!-- 社交信息 -->
				<div class="top-social">
					<?php
						//微博
						if ($this->options->SINA){
							echo '<li><a href="'.$this->options->SINA.'" target="_blank" rel="nofollow" class="social-sina"><img src="'.theurl.'images/sina.png"/></a></li>';
						}
						//微信
						if ($this->options->Wechat){
							echo '<li class="qq"><img style="cursor: pointer" src="'.theurl.'images/wechat.png"/></a><div class="qqInner">'.$this->options->Wechat.'</div></li>';
						}
						//QQ
						if ($this->options->QQnum){
							echo '<li class="qq"><a href="http://wpa.qq.com/msgrd?v=3&uin='.$this->options->QQnum.'&site=qq&menu=yes" target="_blank" rel="nofollow" ><img src="'.theurl.'images/qq.png"/></a>
									<div class="qqInner">'.$this->options->QQnum.'</div>
								  </li>';
						}
						//酷安
						if ($this->options->coolapk){
							echo '<li class="qq"><a href="'.$this->options->coolapkLink.'" target="_blank" rel="nofollow" ><img src="'.theurl.'images/coolapk.png"/></a>
									<div class="qqInner">'.$this->options->coolapk.'</div>
								  </li>';
						}
						//QQ空间
						if ($this->options->Qzone){
							echo '<li><a href="'.$this->options->Qzone.'" target="_blank" rel="nofollow" class="social-qzone"><img src="'.theurl.'images/qzone.png"/></a></li>';
						}
						//Github
						if ($this->options->Github){
							echo '<li><a href="'.$this->options->Github.'" target="_blank" rel="nofollow" class="social-github"><img src="'.theurl.'images/github.png"/></a></li>';
						}
						//Bilibili
						if ($this->options->Bilibili){
							echo '<li><a href="'.$this->options->Bilibili.'" target="_blank" rel="nofollow" class="social-bilibili"><img src="'.theurl.'images/bilibili.png"/></a></li>';
						}
					?>
				</div>
			</div>
		</div>
		<!-- 首页大图结束 -->
	</div>
<div class=""></div>
<div id="content" class="site-content">
<!-- 判断是否搜索 -->		
<?php if(!$this->is('index') && !$this->is('front')): ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- 判断搜索是否有结果-是 -->	
		<?php if ($this->have()): ?>
			<header class="page-header">
			<h1 class="page-title">搜索结果: <span><?php $this->archiveTitle(array('category'=>_t('分类“%s”下的文章'),'search'=>_t('包含关键字“%s”的文章'),'tag' =>_t('标签“%s”下的文章'),'author'=>_t('%s 的主页')), '', ''); ?></span></h1>
			</header>
		<!-- 判断搜索是否有结果-否 -->	
		<?php else: ?>
			<div class="search-box">
				<form class="s-search">
					<i class="iconfont">&#xe6f0;</i>
					<input class="text-input" type="search" name="s" placeholder="搜索...">	
				</form>
			</div>
			<section class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title">搜索结果: <span><?php $this->archiveTitle(array('category'=>_t('分类“%s”下暂无文章'),'search'=>_t('暂无包含关键字“%s”的文章'),'tag' =>_t('标签“%s”下暂无文章'),'author'=>_t('%s 的主页')), '', ''); ?></span></h1>
				</header>
				<div class="page-content">
					<div class="sorry">
						<p>抱歉, 没有找到你想要的文章. 看看其他文章吧.</p>
						<div class="sorry-inner">
							<ul class="search-no-reasults">
								<?php getRandomPosts('5');?>
							</ul>
						</div>
					</div>	
				</div>
			</section>			
		<?php endif; ?>	
<?php else: ?>
<!-- 不是搜索显示主页 -->
<!-- 顶部公告内容 -->
<div class="notice">
	<i class="iconfont">&#xe607;</i>
		<div class="notice-content">
		<?php $this->options->NOTICE();?>
		</div>
</div>
<!-- 聚焦内容 -->
<div class="top-feature">
	<h1 class="fes-title">聚焦</h1>
		<div class="feature-content">
		<?php
			$featureCid = explode(',', strtr($this->options->featureCids, ' ', ','));
			$featureNum = 0;
			if(sizeof($featureCid)==3){
				for($i=0;$i<3;$i++){
					$featureNum++;
					$this->widget('Widget_Archive@lunbo'.$i, 'pageSize=1&type=post', 'cid='.$featureCid[$i])->to($ji);
					if ($ji->fields->img){
						$featureImg = $ji->fields->img;
					} else {
						if(img_postthumb($ji->content)){
							$featureImg = img_postthumb($ji->content);
						} else {
							$featureImg = theurl.'images/feature/feature'.$featureNum.'.jpg';
						}
					}
					echo '<li class="feature-'.$featureNum.'"><a href="'.$ji->permalink.'"><div class="feature-title"><span class="foverlay">'.$ji->title.'</span></div><img src="'.$featureImg.'"></a></li>';
				}
			} else {
				echo '
				<li class="feature-1"><a href="https://zhebk.cn/Web/Akina.html"><div class="feature-title"><span class="foverlay">Akina</span></div><img src="'.theurl.'/images/feature/feature1.jpg"></a></li>
				<li class="feature-2"><a href="https://zhebk.cn/Web/userAkina.html"><div class="feature-title"><span class="foverlay">使用说明</span></div><img src="'.theurl.'/images/feature/feature2.jpg"></a></li>
				<li class="feature-3"><a href="https://zhebk.cn/archives.html"><div class="feature-title"><span class="foverlay">文章归档</span></div><img src="'.theurl.'/images/feature/feature3.jpg"></a></li>';
			}
		?>
		</div>
</div>
<!-- 主页内容 -->
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<h1 class="main-title">近况</h1>
<!-- 结束搜索判断 -->
<?php endif; ?>
		<!-- 开始文章循环输出 -->
		<?php while($this->next()): ?>
		<article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
		<!-- 判断文章输出样式 -->
		<?php if ($this->fields->dtMode): ?>
		<div class="post-status">
			<div class="postava">
				<a href="<?php $this->permalink() ?>"><img alt="avatar" src="<?php echo theprofile ?>" srcset="<?php echo theprofile ?> 2x" class="avatar avatar-64 photo" height="64" width="64"></a>
			</div>
			<div class="s-content">
				<a href="<?php $this->permalink() ?>">
				<p><?php $this->excerpt(70, '...'); ?></p>
				<div class="s-time"><i class="iconfont">&#xe604;</i><?php $this->date('Y-n-j'); ?><?php if(Postviews($this)>=1000) echo"<i class='iconfont hotpost' style='margin-left: 5px;'>&#xe618;</i>" ?>
</div>
				</a>
			</div>
			<footer class="entry-footer">
		<?php else: ?>
			<div class="post-entry">
				<div class="feature">
					<a href="<?php $this->permalink() ?>"><div class="overlay"><i class="iconfont">&#xe61e;</i></div><img src="<?php if(array_key_exists('icon',unserialize($this->___fields())) & $this->fields->icon != null){$this->fields->icon();}else{echo theurl.'images/random/deu'.mt_rand(1,7).'.jpg';}?>"></a>
				</div>
				<h1 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></h1>
				<div class="p-time">
				<i class="iconfont">&#xe604;</i> <?php $this->date('Y-n-j'); ?><?php if(Postviews($this)>=1000) echo"<i class='iconfont hotpost' style='margin-left: 5px;'>&#xe618;</i>" ?>
				</div>
				<p><?php $this->excerpt(70, '...'); ?></p>
				<!-- 文章下碎碎念 -->
				<footer class="entry-footer">
					<div class="post-more">
							<a href="<?php $this->permalink() ?>"><i class="iconfont">&#xe61c;</i></a>
					</div>
		<?php endif; ?>
					<div class="info-meta">
						<div class="comnum">
							<span><i class="iconfont">&#xe610;</i><a href="<?php $this->permalink() ?>"><?php $this->commentsNum(_t('NOTHING'), _t('1条评论'), _t('%d条评论')); ?></a></span>
						</div>
						<div class="views">
							<span><i class="iconfont">&#xe614;</i> <?php echo Postviews($this); ?> 热度</span>
						</div>
					</div>
				</footer>
			</div>
				<hr>
		</article>
		<?php endwhile; ?>
		<!-- 结束文章循环输出 -->
		<!-- 翻页按钮 -->
		<nav class="navigator">
			<?php $this->pageLink('<i class="iconfont">&#xe611;</i>'); ?>	
			<i class="navnumber"><?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></i>
			<?php $this->pageLink('<i class="iconfont">&#xe60f;</i>','next'); ?>
		</nav>
	</main>
	<div id="pagination"><?php $this->pageLink('加载更多','next'); ?></div>
</div>
</div>
<!-- 结束主页内容 -->
</div>
</section>
<!-- 页底信息 -->
<?php $this->need('footer.php'); ?>
