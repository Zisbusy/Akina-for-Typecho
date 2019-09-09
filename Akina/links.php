<?php
/**
 * links
 *
 * @package custom
 */
  $this->need('header.php'); 
?>
<!-- 友链部分 -->
<div class="blank"></div>
<div class="headertop"></div>
<?php if (array_key_exists('img',unserialize($this->___fields()))): ?>
	<div class="pattern-center">
		<div class="pattern-attachment-img" style="background-image: url(<?php $this->fields->img(); ?>)"></div>
		<header class="pattern-header"><h1 class="entry-title"><?php $this->title() ?></h1></header>
	</div>
<?php endif; ?>
<div id="content" class="site-content">
	<span class="linkss-title"><?php $this->title() ?></span>
	<article class="hentry">
		<?php $this->content(); ?>
	</article>
</div>
</div>
</section>
<?php $this->need('footer.php'); ?>