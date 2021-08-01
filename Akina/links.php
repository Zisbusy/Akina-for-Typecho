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
        ');
    } else {
        echo('<style> @media (max-width: 860px){#content {margin-top: 30px;}} </style>');
    }
?>
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
