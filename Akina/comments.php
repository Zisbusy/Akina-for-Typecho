<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
	$depth = $comments->levels +1;
?>
	<?php //判断邮箱类型选取头像地址
		$email = $comments->mail;
	if(preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$email)){
		$qqnumber = explode("@",$email);
		$avatar = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=100';
		$avatar2x = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=160';
	 }else{
		$avatar = 'https://gravatar.loli.net/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d=mm';
		$avatar2x = 'https://gravatar.loli.net/avatar/' . md5(strtolower($comments->mail)) . '?s=160&r=X&d=mm';
		
	}
	?>
	<li class="comment <?php $comments->alt('comment-odd', 'comment-even');?> depth-<?php echo $depth ?>" id="li-<?php $comments->theId(); ?>">
		<div id="<?php $comments->theId(); ?>" class="comment_body contents">
			<div class="profile">
				<a href="<?php $comments->url(); ?>"><img alt="<?php $comments->author(false); ?>" src="<?php echo $avatar ?>" srcset="<?php echo $avatar2x ?> 2x" class="avatar avatar-50 photo" height="50" width="50"></a>
			</div>
			<section class="commeta">
				<div class="left">
					<h4 class="author"><a href="<?php $comments->url(); ?>"><img alt="<?php $comments->author(false); ?>" src="<?php echo $avatar ?>" srcset="<?php echo $avatar2x ?> 2x" class="avatar avatar-50 photo" height="50" width="50"/><?php $comments->author(false); ?><span class="isauthor" title="Author"><i class="iconfont">&#xe615;</i></span></a></h4>
				</div>
				<a rel='nofollow' class='comment-reply-link' href='<?php $comments->responseUrl(); ?>' onclick="return TypechoComment.reply('<?php $comments->theId(); ?>', <?php $comments->coid();?>);" aria-label='回复给<?php $comments->author(false); ?>'>回复</a>
				<div class="right">
					<div class="info"><time datetime="<?php $comments->date('Y-m-d'); ?>"><?php $comments->date('Y年m月d日'); ?></time></div>
				</div>
			</section>
			<div class="body">
				<p>
					<?php get_commentReply_at($comments->coid); ?>                                   <!-- 评论@ -->
					<?php $cos = preg_replace('#</?[p|P][^>]*>#','',$comments->content);echo $cos;?> <!-- 评论内容 -->
				</p>
			</div>
		</div>
		<?php if ($comments->children){ ?>
		<!-- 嵌套评论代码 -->
		<div class="children">
			<?php $comments->threadedComments($options); ?>
		</div>
		<?php } ?>
	</li>
<?php } ?>

<section id="comments" class="comments">
	<!-- 隐藏评论 -->
	<div class="commentwrap comments-hidden">
		<div class="notification"><i class="iconfont">&#xe610;</i><?php $this->commentsNum(_t('添加评论'), _t('查看沙发'), _t('查看评论')); ?></div>
	</div>
		<!-- 输出评论信息 -->
	<div class="comments-main">
		<h3 id="comments-list-title">Comments | <a ><?php $this->commentsNum(_t('NOTHING'), _t('<span class="noticom">1</span>条评论'), _t('<span class="noticom">%d</span>条评论')); ?></a></h3> 
		<div id="loading-comments"><span></span></div>
		<!-- 评论内容 -->
	<div id="comments-ajax">
	<?php $this->comments()->to($comments); ?>
    <?php $comments->listComments(); ?>
	</div>
	<?php if ($comments->have()): ?>
		<!-- 评论翻页 -->
		<nav id="comments-navi">
		    <div class="lists-navigator clearfix">
				<?php $comments->pageNav('←','→','2','...'); ?>
			</div>
		</nav>
	<?php endif; ?>
		<!--评论框-->
		<!-- 判断设置是否允许对当前文章进行评论 -->
		<?php if($this->allow('comment')): ?>
		<nav id="comments-navi"></nav>
		<div id="respond_box">
			<div id="<?php $this->respondId(); ?>" class="comment-respond">
				<div class="cancel-comment-reply">
					<?php $comments->cancelReply(); ?>
				</div>
				<!-- 输入表单开始 -->
				<form action="<?php $this->commentUrl() ?>" method="post" id="commentform">
					<!-- 如果当前用户已经登录 -->
					<?php if($this->user->hasLogin()): ?>
					<p>登录者： <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>&nbsp;&nbsp;<a href="<?php $this->options->logoutUrl(); ?>"title="退出">[ 退出 ]</a></p>
					<!-- 若当前用户未登录 -->
					<?php else: ?>
					<div class="author-updown">Welcome back , <a id="toggle-comment-info">[ 修改 ]</a></div>
					<?php endif; ?>
					<div id="comment-author-info">
						<input type="text" name="author" id="author" class="commenttext" placeholder="Name"  value="<?php $this->remember('author'); ?>" size="22" tabindex="1" placeholder="Name" />
						<label for="author"></label>
					
						<input type="text" name="mail" id="mail" class="commenttext" value="<?php $this->remember('mail'); ?>" size="22" placeholder="Email" tabindex="2" />
						<label for="mail"></label>
					
						<input type="text" name="url" id="url" class="commenttext" value="<?php $this->remember('url'); ?>" size="22"placeholder="http://"  tabindex="3" />
						<label for="url"></label>
                  </div>
					<div class="clear"></div>
					<p><textarea name="text" id="comment" class="OwO-textarea" placeholder="come on baby !" tabindex="4" cols="50" rows="5"></textarea></p>
					<div class="com-footer">
						<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="发表评论" />
						<input type='hidden' name='comment_post_ID' value='58' id='comment_post_ID' />
						<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
							<!--表情-->
						<div class="OwO"></div>
						<script type="text/javascript" src="<?php echo theurl; ?>js/OwO.js" defer="defer"></script>
					</div>
				</form>
			<?php else: ?>
				<section class="author-profile">
					<p><i class="iconfont">&#xe61a;</i>该文章已经关闭评论</p>
				</section>
			<?php endif; ?>
			<div class="clear"></div>
			</div>
		</div>
	</div>
</section>