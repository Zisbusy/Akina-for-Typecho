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
	    <?php
	        if( !$this->content && !class_exists('Links_Plugin')) {
	            echo'
            		<div class="nodata">
            		    <img src="https://blog.zixu.site/usr/themes/Akina/images/warn.png">
            		    <div class="nodataText">
                		    <p>没有相关的数据！</p>
                		    <p>请在后台编写友链html或者安装<a href="https://github.com/Zisbusy/Akina-for-Typecho/tree/master/%E5%8F%AF%E9%80%89%E6%8F%92%E4%BB%B6" target="_blank" rel="nofollow noopener noreferrer">插件</a>
                		    </p>
            		    </div>
            		</div>
	            ';
	        } else {
	            $this->content();
		    	if(class_exists('Links_Plugin')){
		    	    $rules ='<br/>
                            <div class="links">
                                <ul class="link-items fontSmooth">
                                    <li class="link-item">
                                        <a class="link-item-inner effect-apollo" href="{url}" title="{name}" target="_blank" >
                                            <span class="sitename">{name}</span>
                                            <div class="linkdes">{title}</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>';
			         Links_Plugin::output($pattern=$rules, $links_num=0, $sort=NULL);
		    	};
	        }
	    ?>
	</article>
</div>
</div>
</section>
<?php $this->need('footer.php'); ?>
