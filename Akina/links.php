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
		<br/>
		<div class="links">
		    <ul class="link-items fontSmooth">
		    	<?php 
		    		if(class_exists('Links_Plugin')){
		    		$rules ='<li class="link-item">
						    	<a class="link-item-inner effect-apollo" href="{url}" title="{name}" target="_blank" >
							    	<span class="sitename">{name}</span>
							    	<div class="linkdes">{title}</div>
						    	</a>
							 </li>';
			         Links_Plugin::output($pattern=$rules, $links_num=0, $sort=NULL);
		    		};
		        ?>
		    </ul>
		</div>
	</article>
</div>
</div>
</section>
<?php $this->need('footer.php'); ?>
