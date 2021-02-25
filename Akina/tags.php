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
<?php if (array_key_exists('thumbnail',unserialize($this->___fields())) & $this->fields->thumbnail != null): ?>
	<div class="pattern-center">
		<div class="pattern-attachment-img" style="background-image: url(<?php $this->fields->thumbnail(); ?>)"></div>
		<header class="pattern-header"><h1 class="entry-title"><?php $this->title() ?></h1></header>
	</div>
<?php endif; ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article  class="hentry">
				<header class="entry-header">
					<h1 class="entry-title"><?php $this->title() ?></h1>
				</header>
				<div class="entry-content">
				    <!--编辑器内容-->
					<?php $this->content(); ?>
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
