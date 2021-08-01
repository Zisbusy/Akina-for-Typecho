<?php
/**
 * page
 *
 * @package custom
 */
  $this->need('header.php'); 
?>
<div class="blank"></div>
<div class="headertop"></div>
<?php 
    if ( $this->fields->radioPostImg != 'none' && $this->fields->radioPostImg != null ) {
        $bgImgUrl = '';
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
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article  class="hentry">
				<header class="entry-header">
					<h1 class="entry-title"><?php $this->title() ?></h1>
				</header>
				<div class="entry-content">
					<?php $this->content(); ?>
				</div>
			</article>
		</main>
	</div>
</div>
<?php $this->need('comments.php'); ?>
</div>
</section>
<?php $this->need('footer.php'); ?>
