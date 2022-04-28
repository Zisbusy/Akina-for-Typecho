<?php
/**
 * tags
 *
 * @package custom
 */
  $this->need('header.php'); 
?>
<div class="blank"></div>
<div class="headertop"></div>
<?php 
    $bgImgUrl = '';
    if ( $this->fields->radioPostImg != 'none' && $this->fields->radioPostImg != null ) {
        switch ( $this->fields->radioPostImg ) {
        case 'custom':
            $bgImgUrl = $this->fields->thumbnail;
            break;
        case 'random':
            $bgImgUrl = theurl.'images/postbg/'.mt_rand(1,3).'.jpg';
            break;
        }
        echo('
            <div class="pattern-center">
                <div class="pattern-attachment-img" style="background-image: url('.$bgImgUrl.')"></div>
                    <header class="pattern-header">
                <h1 class="entry-title">'.$this->title.'</h1>
            </header>
            </div>
            <style> @media (max-width: 860px){.site-main {padding-top: 30px;}} </style>
        ');
    }
?>
<!-- 透明导航栏后调整间距 -->
<?php if (strlen($bgImgUrl) <= 4 && !empty($this->options->menu) && in_array('transparent', $this->options->menu) ): ?>
<style>
  .site-main {
    padding: 160px 0 0;
  }
  @media (max-width: 860px){
    .site-main {
    padding: 80px 0 0;
  }
  }
</style>
<?php endif ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" style="margin-bottom:50px;">
			<article  class="hentry">
      <?php echo '<embed style="max-width: 300px;margin: 0 auto 83px;display: block;" src="'.theurl.'images/tags.svg">';?>
				<header class="entry-header">
					<h1 class="entry-title"><?php $this->title() ?></h1>
				</header>
				<div class="entry-content">
					<!--编辑器内容-->
					<?php
						$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
						$replacement = '<a href="$1" alt="'.$this->title.'" title="点击放大图片"><img class="aligncenter" src="$1" title="'.$this->title.'"></a>';
						echo preg_replace($pattern, $replacement, $this->content);
					?>
	                <!--标签云输出-->
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=0')->to($tags); ?>
                    <?php if($tags->have()): ?>
                        <ul class="tags-list">
                            <?php while ($tags->next()): ?>
                                <li><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?> (<?php $tags->count(); ?>)</a></li>
                            <?php endwhile; ?>
                    <?php else: ?>
                            <li><?php _e('没有任何标签'); ?></li>
                        </ul>
                    <?php endif; ?>
				</div>
			</article>
		</main>
	</div>
</div>
</div>
</section>
<?php $this->need('footer.php'); ?>
